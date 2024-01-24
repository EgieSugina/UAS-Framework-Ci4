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
    public function getLibraryGames($user_id)
    {
        $query = $this->select('gl.games_list_id, gl.user_id, gl.game_id, gl.product_code, gp.judul_game, gp.deskripsi, gp.harga, gp.tanggal_rilis, gp.publisher, gp.platform, gp.genre, gp.rating, gp.cover, gp.backcover')
            ->from('games_list as gl', 'left')
            ->join('games_product as gp', 'gp.game_id = gl.game_id');


        $query->where('gl.user_id', $user_id);

        return $query->findAll();
    }
}