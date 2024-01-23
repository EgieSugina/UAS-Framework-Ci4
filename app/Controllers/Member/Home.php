<?php
namespace App\Controllers\Member;

use CodeIgniter\Controller;
use App\Models\M_GamesProduct;
use App\Models\M_Cart;

class Home extends Controller
{
    private $title;
    protected $role;
    protected $user_id;
    protected $m_models;
    protected $m_models_cart;

    public function __construct()
    {
        helper('layoutmember');
        $this->m_models = new M_GamesProduct();
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
    public function checkout($id)
    {
        $this->m_models_cart->checkout($this->user_id);
        return redirect()->to('library');
    }
    // public function addwishlist($id)
    // {
    //     echo var_dump($id);

    //     return redirect()->back();

    // }
}
