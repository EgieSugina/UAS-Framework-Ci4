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
}
