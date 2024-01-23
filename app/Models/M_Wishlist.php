<?php
// app/Models/WishlistModel.php

namespace App\Models;

use CodeIgniter\Model;

class WishlistModel extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'wishlist_id';
    protected $allowedFields = ['user_id', 'game_id'];

    public function addToWishlist($user_id, $game_id)
    {
        $existingItem = $this->where(['user_id' => $user_id, 'game_id' => $game_id])->first();

        if (!$existingItem) {
            $this->insert(['user_id' => $user_id, 'game_id' => $game_id]);
        }
    }
    public function removeFromWishlist($wishlist_id)
    {
        $this->delete($wishlist_id);
    }
    public function isItemInWishlist($user_id, $game_id)
    {
        $existingItem = $this->where(['user_id' => $user_id, 'game_id' => $game_id])->first();

        return $existingItem !== null;
    }
}
