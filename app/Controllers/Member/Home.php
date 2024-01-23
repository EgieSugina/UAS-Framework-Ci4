<?php
namespace App\Controllers\Member;

use CodeIgniter\Controller;
use App\Models\M_GamesProduct;

class Home extends Controller
{
    private $title;
    protected $role;
    protected $m_models;

    public function __construct()
    {
        helper('layoutmember');
        $this->m_models = new M_GamesProduct();

        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $dataForm['data'] = $this->m_models->getGames();
        layoutMember('Dashbord', 'pages/member/home/index', $dataForm);
    }
    public function wishlist()
    {
        $dataForm['data'] = $this->m_models->getGames();
        layoutMember('Dashbord', 'pages/member/wishlist/index', $dataForm);
    }
    public function cart()
    {
        $dataForm['data'] = $this->m_models->getGames();
        layoutMember('Dashbord', 'pages/member/cart/index', $dataForm);
    }
    public function addcart($id)
    {
        echo var_dump($id);
        // return redirect('/');

    }
    public function addwishlist($id)
    {
        echo var_dump($id);

        // return redirect('/');

    }
}
