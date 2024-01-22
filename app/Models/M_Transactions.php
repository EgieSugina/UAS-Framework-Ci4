<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Transactions extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['transaction_id', 'order_id', 'payment_method_id', 'tanggal_transaksi', 'status_transaksi'];
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
}