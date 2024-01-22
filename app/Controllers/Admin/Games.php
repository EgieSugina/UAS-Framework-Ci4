<?php
namespace App\Controllers\Admin;

use App\Models\M_GamesProduct;

use CodeIgniter\Controller;

class Games extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->title = "Games Product";
        $this->m_models = new M_GamesProduct();
        helper(['form']);
        helper('image');

        helper('layoutadmin');
        $this->role = strtolower(session('user')['role'] ?? '');
    }
    public function index()
    {
        $data_table['data'] = $this->m_models->getGames(); //$this->m_models->getUser();
        $data_table['primaryKey'] = 'game_id';
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['Judul Game', 'Harga', 'Tanggal Rilis', 'Publisher', 'Platform', 'Genre', 'Rating'];
        $data_table['fields'] = ['judul_game', 'harga', 'tanggal_rilis', 'publisher', 'platform', 'genre', 'rating'];

        $data = [
            'table' => view('pages/components/tabels', $data_table)
        ];
        layoutAdmin('Dashbord', 'pages/admin/games/index', $data);
    }
    public function tambah()
    {
        $data['role'] = $this->role;
        $data['act'] = '/save';

        layoutAdmin('Tambah ' . $this->title, 'pages/admin/games/form', $data);
    }
    public function save()
    {
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
            'genre' => $genre,
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
        $this->m_models->insertGames($userData);
        return redirect()->to($this->role . '/games')->with('success', 'Barang berhasil ditambah.');

    }
    public function edit($id)
    {
        $data['game_product'] = $this->m_models->getGamesById($id);
        $data['act'] = '/save';
        layoutAdmin('Tambah ' . $this->title, 'pages/admin/games/form', $data);
    }
}


