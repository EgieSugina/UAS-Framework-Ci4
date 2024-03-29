<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\M_GamesProduct;

class Dashboard extends Controller
{
    private $title;
    protected $role;
    protected $m_models;

    public function __construct()
    {
        helper('layoutadmin');
        $this->m_models = new M_GamesProduct();

        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $dataForm['data'] = $this->m_models->getGames();
        layoutAdmin('Dashbord', 'pages/admin/dashboard', $dataForm);
    }
}