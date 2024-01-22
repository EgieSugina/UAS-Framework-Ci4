<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Members extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        helper('layoutadmin');

        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $dataForm = ['your_data' => '...']; // Your data for the view
        layoutAdmin('Dashbord', 'pages/admin/members/index', $dataForm);
    }
}