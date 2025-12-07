<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;

class BarangController extends BaseController
{
    protected $barang;

    public function __construct()
    {
        $this->barang = new ModelBarang();
    }

    public function index()
    {
        $data['barang'] = $this->barang->findAll();

        return view('admin/barang/index', $data);
    }

    public function create()
    {
        return view('admin/barang/create');
    }

    public function store()
    {
        $this->barang->save([
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
        ]);

        session()->setFlashdata('success', 'Barang berhasil ditambahkan');

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->barang->find($id);

        return view('admin/barang/edit', $data);
    }

    public function update($id)
    {
        $this->barang->update($id, [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
        ]);

        session()->setFlashdata('success', 'Barang berhasil diupdate');

        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->barang->delete($id);

        session()->setFlashdata('success', 'Barang berhasil dihapus');

        return redirect()->to('/barang');
    }
}
