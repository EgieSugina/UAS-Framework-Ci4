<?php
namespace App\Models;

use CodeIgniter\Model;

class M_GamesProduct extends Model
{
    protected $table = 'games_product';
    protected $primaryKey = 'game_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['game_id', 'judul_game', 'deskripsi', 'harga', 'tanggal_rilis', 'publisher', 'platform', 'genre', 'rating', 'cover', 'backcover'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function getGames()
    {
        return $this->findAll();
    }
    public function insertGames($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->insertID();
    }
    public function getGamesById($id)
    {
        return $this->find($id);
    }
    public function updateGames($id, $data)
    {
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array($this->primaryKey => $id));

    }
}