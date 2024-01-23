<?php

namespace App\Models;

use CodeIgniter\Model;
use Michalsn\Uuid\Uuid;

class M_Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'game_id', 'jumlah'];
    public function addToCart($user_id, $game_id, $quantity)
    {
        $existingItem = $this->where(['user_id' => $user_id, 'game_id' => $game_id])->first();
        if ($existingItem) {
            $newQuantity = $existingItem['jumlah'] + $quantity;
            $this->update($existingItem['cart_id'], ['jumlah' => $newQuantity]);
        } else {
            $this->insert(['user_id' => $user_id, 'game_id' => $game_id, 'jumlah' => $quantity]);
        }
    }
    public function reduceQuantity($cart_id, $quantity)
    {
        $existingItem = $this->find($cart_id);
        if ($existingItem) {
            $newQuantity = max(0, $existingItem['jumlah'] - $quantity);
            $this->update($cart_id, ['jumlah' => $newQuantity]);
        }
    }
    public function countItemsByUserId($user_id)
    {
        return $this->where('user_id', $user_id)->countAllResults();
    }
    public function getCartItemsWithTotalQuantity($user_id)
    {
        $cartItems = $this->select('cart.user_id, cart.game_id, SUM(cart.jumlah) as total_quantity,SUM(cart.jumlah * games_product.harga) as total_cost, games_product.judul_game, games_product.deskripsi, games_product.harga, games_product.tanggal_rilis, games_product.publisher, games_product.platform, games_product.genre, games_product.rating, games_product.cover, games_product.backcover')
            ->join('games_product', 'games_product.game_id = cart.game_id')
            ->where('cart.user_id', $user_id)
            ->groupBy('cart.game_id')
            ->findAll();
        return $cartItems;
    }
    public function getTotalCartCost($user_id)
    {
        $totalCost = $this->select('SUM(cart.jumlah * games_product.harga) as total_cost')
            ->join('games_product', 'games_product.game_id = cart.game_id')
            ->where('cart.user_id', $user_id)
            ->get()
            ->getRowArray();
        return $totalCost['total_cost'] ?? 0;
    }
    public function checkout($user_id)
    {
        $cartItems = $this->getCartItemsWithTotalQuantity($user_id);

        if (empty($cartItems)) {
            return false;
        }

        $this->db->transBegin();

        try {
            $transactionData = [
                'user_id' => $user_id,
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
                'status_transaksi' => 'completed'
            ];

            $this->db->table('transactions')->insert($transactionData);

            // Check if the insert was successful before getting the insert ID
            if ($this->db->affectedRows() > 0) {
                $transactionId = $this->db->insertID();

                foreach ($cartItems as $item) {
                    $transactionDetailData = [
                        'transaction_id' => $transactionId,
                        'game_id' => $item['game_id'],
                        'jumlah' => $item['total_quantity'],
                        'subtotal' => ($item['total_cost'] * 0.2) + $item['total_cost']
                    ];
                    $this->db->table('transaction_details')->insert($transactionDetailData);
                }

                $this->db->table('cart')->where('user_id', $user_id)->delete();

                foreach ($cartItems as $item) {
                    $productCode = new Uuid(new \Michalsn\Uuid\Config\Uuid());
                    $gamesListData = [
                        'user_id' => $user_id,
                        'game_id' => $item['game_id'],
                        'product_code' => $productCode->uuid4()->toString()
                    ];
                    $this->db->table('games_list')->insert($gamesListData);
                }

                $this->db->transCommit();
                return true;
            } else {
                throw new \Exception('Failed to insert transaction data. No rows affected.');
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Checkout failed: ' . $e->getMessage());
            echo var_dump($e->getMessage());
            return false;
        }
    }

}