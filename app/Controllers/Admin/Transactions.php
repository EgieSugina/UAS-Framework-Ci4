<?php
namespace App\Controllers\Admin;

use App\Models\M_Transactions;

use CodeIgniter\Controller;

class Transactions extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->title = "Transactions";
        $this->m_models = new M_Transactions();
        helper(['form']);
        helper('image');

        helper('layoutadmin');
        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $data_table['data'] = $this->m_models->getTrx(); //$this->m_models->getUser();
        $data_table['primaryKey'] = 'game_id';
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['transaction_id', 'order_id', 'payment_method_id', 'tanggal_transaksi', 'status_transaksi'];
        $data_table['fields'] = ['transaction_id', 'order_id', 'payment_method_id', 'tanggal_transaksi', 'status_transaksi'];

        $data = [
            'table' => view('pages/components/tabels-only', $data_table)
        ];
        layoutAdmin('Dashbord', 'pages/admin/transactions/index', $data);
    }
    public function tambah()
    {
        $data['role'] = $this->role;
        $data['act'] = '/save';

        layoutAdmin('Tambah ' . $this->title, 'pages/admin/transactions/form', $data);
    }
    public function save()
    {
        $genre = $this->request->getPost('genre');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul_game' => 'required',
            'harga' => 'required',
            'tanggal_rilis' => 'required',
            'publisher' => 'required',
            'platform' => 'required',
            'genre' => 'required',
            'deskripsi' => 'required',
            'rating' => 'required',
            'cover' => 'uploaded[cover]|max_size[cover,1024]|is_image[cover]',
            'backcover' => 'uploaded[backcover]|max_size[backcover,1024]|is_image[backcover]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $judul_game = $this->request->getPost('judul_game');
        $harga = $this->request->getPost('harga');
        $tanggal_rilis = $this->request->getPost('tanggal_rilis');
        $publisher = $this->request->getPost('publisher');
        $platform = $this->request->getPost('platform');
        $genre = $this->request->getPost('genre');
        $deskripsi = $this->request->getPost('deskripsi');
        $rating = $this->request->getPost('rating');
        $userData = [
            'judul_game' => $judul_game,
            'harga' => $harga,
            'tanggal_rilis' => $tanggal_rilis,
            'publisher' => $publisher,
            'platform' => $platform,
            'genre' => implode(',', $genre),
            'rating' => $rating,
            'deskripsi' => $deskripsi,

        ];
        $backcover = $this->request->getFile('backcover');
        $cover = $this->request->getFile('cover');
        if ($cover->isValid() && !$cover->hasMoved()) {
            $imageData = processAndUploadImage($cover);
            $userData['cover'] = $imageData;
        }
        if ($backcover->isValid() && !$backcover->hasMoved()) {
            $imageDatabackcover = processAndUploadImage($backcover);
            $userData['backcover'] = $imageDatabackcover;
        }
        $this->m_models->insertTrx($userData);
        return redirect()->to($this->role . '/transactions')->with('success', 'Barang berhasil ditambah.');

    }
    public function edit($id)
    {
        $data['role'] = $this->role;

        $data['game_product'] = $this->m_models->getTrxById($id);
        $data['act'] = '/update';
        layoutAdmin('Tambah ' . $this->title, 'pages/admin/transactions/form', $data);
    }
    public function update()
    {

        $judul_game = $this->request->getPost('judul_game');
        $harga = $this->request->getPost('harga');
        $tanggal_rilis = $this->request->getPost('tanggal_rilis');
        $publisher = $this->request->getPost('publisher');
        $platform = $this->request->getPost('platform');
        $genre = $this->request->getPost('genre');
        $deskripsi = $this->request->getPost('deskripsi');
        $rating = $this->request->getPost('rating');
        $id = $this->request->getPost('game_id');

        $userData = [
            'judul_game' => $judul_game,
            'harga' => $harga,
            'tanggal_rilis' => $tanggal_rilis,
            'publisher' => $publisher,
            'platform' => $platform,
            'genre' => implode(',', $genre),
            'rating' => $rating,
            'deskripsi' => $deskripsi,

        ];

        $this->m_models->updateTrx($id, $userData);
        return redirect()->to($this->role . '/transactions')->with('success', 'Barang berhasil dirubah.');

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
        return redirect()->to($this->role . '/transactions')->with($status, $msg);
    }
}
