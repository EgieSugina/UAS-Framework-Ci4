<?php
namespace App\Controllers\Member;

use CodeIgniter\Controller;

class Home extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        helper('layoutmember');

        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $dataForm = ['your_data' => '...']; // Your data for the view
        layoutMember('Dashbord', 'pages/member/home/index', $dataForm);
    }
}