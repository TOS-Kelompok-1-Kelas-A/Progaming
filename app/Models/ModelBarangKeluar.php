<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ModelBarang;

class ModelBarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
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

    // Kurangi stok otomatis
    protected $beforeInsert = ['cekStokSebelumKeluar'];
    protected $afterInsert  = ['kurangiStok'];

    // Validasi stok cukup sebelum insert
    protected function cekStokSebelumKeluar(array $data)
    {
        $barangModel = new ModelBarang();

        $idBarang = $data['data']['id_barang'];
        $jumlah = $data['data']['jumlah'];

        $barang = $barangModel->find($idBarang);

        if ($barang['stok'] < $jumlah) {
            throw new \Exception('Stok tidak cukup!');
        }

        return $data;
    }

    // Kurangi stok setelah insert
    protected function kurangiStok(array $data)
    {
        $barangModel = new ModelBarang();

        $idBarang = $data['data']['id_barang'];
        $jumlah = $data['data']['jumlah'];

        // Kurangi stok
        $barangModel->kurangiStok($idBarang, $jumlah);

        return $data;
    }
}
