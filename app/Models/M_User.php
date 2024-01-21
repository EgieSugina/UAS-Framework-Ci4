<?php
namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'fullname', 'username', 'email', 'role', 'password', 'img'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertUser($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getUser()
    {
        return $this->findAll();
    }
    public function getUserById($id)
    {
        return $this->find($id);
    }
    public function updateUser($id, $data)
    {
        $this->db->table($this->table)->update($data, array('id' => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array('id' => $id));
    }
}
