<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'kode_barang',
        'nama_barang',
        'stok',
        'satuan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function tambahStok($idBarang, $jumlah)
    {
        $barang = $this->find($idBarang);

        $stokBaru = $barang['stok'] + $jumlah;

        return $this->update($idBarang, ['stok' => $stokBaru]);
    }

    public function kurangiStok($idBarang, $jumlah)
    {
        $barang = $this->find($idBarang);

        if ($barang['stok'] < $jumlah) {
            return false; 
        }

        $stokBaru = $barang['stok'] - $jumlah;

        return $this->update($idBarang, ['stok' => $stokBaru]);
    }
}
