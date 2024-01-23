<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Transactions extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['transaction_id', 'user_id', 'tanggal_transaksi', 'status_transaksi'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function getTrx()
    {
        return $this->findAll();
    }
    public function insertTrx($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->insertID();
    }
    public function getTrxById($id)
    {
        return $this->find($id);
    }
    public function updateTrx($id, $data)
    {
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array($this->primaryKey => $id));

    }
    public function getTransactionDetails()
    {
        return $this->db->table('transactions')
            ->select('transactions.transaction_id, users.fullname, users.email, games_product.judul_game, transaction_details.jumlah, transaction_details.subtotal, games_list.product_code')
            ->join('users', 'users.user_id = transactions.user_id')
            ->join('transaction_details', 'transaction_details.transaction_id = transactions.transaction_id')
            ->join('games_product', 'games_product.game_id = transaction_details.game_id')
            ->join('games_list', 'games_list.game_id = transaction_details.game_id') // Join with games_list
            ->get()
            ->getResultArray();
    }
}