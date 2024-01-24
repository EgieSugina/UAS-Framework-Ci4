<?php
namespace App\Controllers\Member;

use CodeIgniter\Controller;
use App\Models\M_GamesProduct;
use App\Models\M_Cart;
use App\Models\M_User;

class Home extends Controller
{
    private $title;
    protected $role;
    protected $user_id;
    protected $m_models;
    protected $m_models_cart;
    protected $m_models_users;

    public function __construct()
    {
        helper('layoutmember');
        helper(['form']);

        $this->m_models = new M_GamesProduct();
        $this->m_models_users = new M_User();
        $this->m_models_cart = new M_Cart();

        $this->role = strtolower(session('user')['role'] ?? '');
        $this->user_id = strtolower(session('user')['user_id'] ?? '');
    }
    public function index()
    {

        $dataForm['data'] = $this->m_models->getGames();
        $dataForm['cart'] = $this->m_models_cart->countItemsByUserId($this->user_id);
        layoutMember('Dashbord', 'pages/member/home/index', $dataForm);
    }
    public function profile()
    {

        $dataForm['data_user'] = $this->m_models_users->getUserById($this->user_id);
        $dataForm['cart'] = $this->m_models_cart->countItemsByUserId($this->user_id);
        layoutMember('Dashbord', 'pages/member/profile/index', $dataForm);
    }
    public function library()
    {

        $dataForm['data'] = $this->m_models->getLibraryGames($this->user_id);
        $dataForm['cart'] = $this->m_models_cart->countItemsByUserId($this->user_id);
        $dataForm['library'] = true;
        layoutMember('Dashbord', 'pages/member/library/index', $dataForm);
    }
    // public function wishlist()
    // {
    //     $dataForm['data'] = $this->m_models->getGames();
    //     layoutMember('Dashbord', 'pages/member/wishlist/index', $dataForm);
    // }
    public function cart()
    {
        $dataForm['data'] = $this->m_models->getGames();
        $dataForm['cart'] = $this->m_models_cart->countItemsByUserId($this->user_id);
        $dataForm['cartItems'] = $this->m_models_cart->getCartItemsWithTotalQuantity($this->user_id);
        $dataForm['total'] = $this->m_models_cart->getTotalCartCost($this->user_id);
        layoutMember('Dashbord', 'pages/member/cart/index', $dataForm);
    }
    public function addcart($id)
    {
        $this->m_models_cart->addToCart($this->user_id, $id, 1);
        return redirect()->back();

    }
    // public function addcartpost()
    // {
    //     $jumlah = $this->request->getPost('jumlah');

    //     if (isset($jumlah) && $jumlah > 0) {
    //         $game_id = $this->request->getPost('game_id');
    //         $this->m_models_cart->addToCart($this->user_id, $game_id, $jumlah);
    //     }
    //     echo var_dump(isset($jumlah) && $jumlah > 0);
    //     // return redirect()->back();

    // }
    public function removeitemcart($id)
    {
        $this->m_models_cart->deleteByid($id);
        return redirect()->back();

    }
    public function checkout($id)
    {
        $this->m_models_cart->checkout($this->user_id);
        return redirect()->to('library');
    }
    public function gameDetails($id)
    {
        $data['role'] = $this->role;
        $data['cart'] = $this->m_models_cart->countItemsByUserId($this->user_id);
        $data['game_product'] = $this->m_models->getGamesById($id);
        layoutMember('Dashbord', 'pages/member/details/index', $data);

    }
    // public function addwishlist($id)
    // {
    //     echo var_dump($id);

    //     return redirect()->back();

    // }
}
