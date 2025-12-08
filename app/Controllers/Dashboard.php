<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBarangKeluar;  
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function admin()
    {
        $barangModel = new ModelBarang();
        $masukModel  = new ModelBarangMasuk();
        $keluarModel = new ModelBarangKeluar(); 

        $data = [
            'total_barang' => $barangModel->countAll(),

            'total_masuk' => $masukModel
                ->where("MONTH(tanggal)", date('m'))
                ->countAllResults(),

            'total_keluar' => $keluarModel
                ->where("MONTH(tanggal)", date('m'))
                ->countAllResults(),

            'stok_limit' => $barangModel
                ->where('stok <', 5)
                ->countAllResults(),

            'recent_masuk' => $masukModel
                ->select('barang_masuk.*, barang.nama_barang')
                ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
                ->orderBy('tanggal', 'DESC')
                ->limit(5)
                ->findAll(),

            'recent_keluar' => $keluarModel
                ->select('barang_keluar.*, barang.nama_barang')
                ->join('barang', 'barang.id_barang = barang_keluar.id_barang')
                ->orderBy('tanggal', 'DESC')
                ->limit(5)
                ->findAll()
        ];

        return view('dashboard/admin', $data);
    }


public function staf()
{
    $barangModel = new ModelBarang();
    $masukModel  = new ModelBarangMasuk();
    $keluarModel = new ModelBarangKeluar();

    $today = date('Y-m-d');

    $data = [
        'total_barang' => $barangModel->countAll(),

        'masuk_hari_ini' => $masukModel
            ->where("DATE(tanggal) = '$today'", null, false)
            ->countAllResults(),

        'keluar_hari_ini' => $keluarModel
            ->where("DATE(tanggal) = '$today'", null, false)
            ->countAllResults(),

        'recent_masuk' => $masukModel
            ->select('barang_masuk.*, barang.nama_barang')
            ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
            ->orderBy('tanggal', 'DESC')
            ->limit(5)
            ->findAll(),

        'recent_keluar' => $keluarModel
            ->select('barang_keluar.*, barang.nama_barang')
            ->join('barang', 'barang.id_barang = barang_keluar.id_barang')
            ->orderBy('tanggal', 'DESC')
            ->limit(5)
            ->findAll(),
    ];

    return view('dashboard/staf', $data);
}




}
