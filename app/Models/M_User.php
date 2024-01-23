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
    public function getMember()
    {
        $builder = $this->db->table('users')
            ->select('users.user_id,users.fullname,users.username, users.email, COUNT(games_list.game_id) as game_count')
            ->join('games_list', 'games_list.user_id = users.user_id', 'left')
            ->where('users.role =', 'Member')
            ->groupBy('users.user_id');


        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getUser()
    {
        return $this->where(['role' => 'Admin'])->findAll();
    }
    public function getUserById($id)
    {
        return $this->find($id);
    }
    public function updateUser($id, $data)
    {
        $this->db->table($this->table)->update($data, array('user_id' => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array('user_id' => $id));
    }
}
