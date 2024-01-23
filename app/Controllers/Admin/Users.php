<?php
namespace App\Controllers\Admin;

use App\Models\M_User;
use CodeIgniter\Controller;
use App\Libraries\Claviska\SimpleImage;

class Users extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->title = "User";
        $this->m_models = new M_User();
        $this->role = strtolower(session('user')['role'] ?? '');
        helper('image');
        helper(['form']);
    }
    public function index()
    {
        $data_table['data'] = $this->m_models->getUser();
        $data_table['primaryKey'] = 'user_id';
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['Fullname', 'Username ', 'Email'];
        $data_table['fields'] = ['fullname', 'username', 'email'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/admin/users/index', ['table' => view('pages/components/tabels', $data_table)])
        ];
        echo view('pages/admin/layout', $data);
    }
    public function member()
    {
        $data_table['data'] = $this->m_models->getMember();
        $data_table['primaryKey'] = 'user_id';
        $data_table['judul'] = 'Member';
        $data_table['header'] = ['Fullname', 'Username ', 'Email', 'game owned'];
        $data_table['fields'] = ['fullname', 'username', 'email', 'game_count'];
        $data = [
            'title' => 'Member',
            'content' => view('pages/admin/users/index', ['table' => view('pages/components/tabels-no-button', $data_table)])
        ];
        echo view('pages/admin/layout', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'content' => view('pages/admin/users/form', ['title' => $this->title, 'act' => '/save', 'role' => $this->role]),
        ];
        echo view('pages/admin/layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageData = processAndUploadImage($image);
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $username = $this->request->getPost('username');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $userData = [
                'fullname' => $fullname,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'role' => 'Admin',
                'img' => $imageData,
            ];
            $this->m_models->insert($userData);
            return redirect()->to($this->role . '/users')->with('success', 'Pengguna berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['image' => 'Harap unggah file gambar yang valid.']);
        }
    }
    public function edit($id)
    {
        $dataUsers = $this->m_models->getUserById($id);
        $data = [
            'title' => $this->title,
            'content' => view('pages/admin/users/form', ['data' => $dataUsers, 'title' => $this->title, 'act' => '/update', 'role' => $this->role]),
        ];
        echo view('pages/admin/layout', $data);
    }
    public function update()
    {
        $image = $this->request->getFile('image');
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userData = [
            'fullname' => $fullname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => 'Admin',
        ];
        if ($image->isValid() && !$image->hasMoved()) {
            $imageData = processAndUploadImage($image);
            $userData['img'] = $imageData;
        }
        if ($image->isValid() && !$image->hasMoved()) {
            $imageData = processAndUploadImage($image);
            $userData['img'] = $imageData;
        }
        if (isset($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->m_models->updateUser($this->request->getPost('user_id'), $userData);
        return redirect()->to($this->role . '/users')->with('success', 'Pengguna berhasil diperbarui.');
    }
    public function delete($id)
    {
        $hapus = $this->m_models->deleteByid($id);
        if ($hapus) {
            $msg = 'Data Pengguna berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Data Pengguna gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/users')->with($status, $msg);
    }
}
