<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangMasuk;

class BarangMasukController extends BaseController
{
    protected $barang;
    protected $barangMasuk;

    public function __construct()
    {
        $this->barang = new ModelBarang();
        $this->barangMasuk = new ModelBarangMasuk();
    }

    public function index()
    {
        $data['masuk'] = $this->barangMasuk
            ->select('barang_masuk.*, barang.nama_barang, user.username AS username')
            ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
             ->join('user', 'user.id_user = barang_masuk.id_user', 'left')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        $data['barang'] = $this->barang->findAll();
        return view('admin/barang_masuk/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barang->findAll();
        return view('admin/barang_masuk/create', $data);
    }

    public function store()
    {
        $idUser = session()->get('id_user'); // jika login

        $this->barangMasuk->insert([
            'id_barang' => $this->request->getPost('id_barang'),
            'id_user'   => $idUser,
            'jumlah'    => $this->request->getPost('jumlah'),
            'tanggal'   => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Barang masuk berhasil dicatat');

        return redirect()->to('/barang-masuk');
    }

    public function delete($id)
    {
        $this->barangMasuk->delete($id);
        session()->setFlashdata('success', 'Data barang masuk berhasil dihapus');
        return redirect()->to('/barang-masuk');
    }

    public function stafIndex()
    {
        $data['masuk'] = $this->barangMasuk
            ->select('barang_masuk.*, barang.nama_barang, user.username AS username')
            ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
             ->join('user', 'user.id_user = barang_masuk.id_user', 'left')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        $data['barang'] = $this->barang->findAll();
        return view('staf/barang_masuk/index', $data);
    }

    public function stafCreate()
    {
        $data['barang'] = $this->barang->findAll();
        return view('staf/barang_masuk/create', $data);
    }
}
