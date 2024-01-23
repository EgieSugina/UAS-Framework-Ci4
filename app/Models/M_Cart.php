<?php

namespace App\Models;

use CodeIgniter\Model;

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
}