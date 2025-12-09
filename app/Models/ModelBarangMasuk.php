<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ModelBarang;

class ModelBarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_barang',
        'id_user',
        'jumlah',
        'tanggal'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // bagian update stok barang setelah barang masuk
    protected $afterInsert = ['updateStok'];

    protected function updateStok(array $data)
    {
        $barangModel = new ModelBarang();

        $idBarang = $data['data']['id_barang'];
        $jumlah = $data['data']['jumlah'];

        $barangModel->tambahStok($idBarang, $jumlah);

        return $data;
    }
}
