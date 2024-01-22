<?php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $m_models;
    public function __construct()
    {
        $this->m_models = new M_User();
        helper(['form']);
        helper('image');
    }
    public function index()
    {
        return view('login');
    }
    public function accessDenied()
    {
        return view('access_denied');
    }
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userModel = new M_User();
        $user = $userModel->where('username', $username)
            ->first();
        if ($user && password_verify($password, $user['password'])) {
            $userData = [
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'role' => $user['role'],
                'img' => $user['img'],
            ];
            session()->set('user', $userData);

            if ($user['role'] === 'Admin') {

                return redirect()->to('/admin/dashboard')->with('success', 'Berhasil Login. Selamat Datang ' . $user['fullname']);
            } else {

                return redirect()->to('/')->with('success', 'Berhasil Login. Selamat Datang ' . $user['fullname']);
            }
        } else {
            return redirect()->to('/login')->with('error', 'Invalid credentials');
        }
    }
    public function register()
    {

        return view('register');

    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
    public function saveRegister()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $fullname = $this->request->getPost('fullname');
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $email = $this->request->getPost('email');
        $userData = [
            'fullname' => $fullname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => 'Member',

        ];
        $this->m_models->insert($userData);
        return redirect()->to('login')->with('success', 'Pengguna berhasil dibuat.');

    }
}
