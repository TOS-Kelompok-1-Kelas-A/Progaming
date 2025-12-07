<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{
    public function inventory()
    {
        $barangModel = new \App\Models\ModelBarang();
        $data['barang'] = $barangModel->findAll();
        return view('admin/laporan/inventory', $data);
    }

    public function inventaris()
    {
        $barangMasuk = new \App\Models\ModelBarangMasuk();
        $barangKeluar = new \App\Models\ModelBarangKeluar();

        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');
        $jenis = $this->request->getGet('jenis');

        $data['laporan'] = [];

        if ($start && $end && $jenis) {

            if ($jenis == 'masuk' || $jenis == 'semua') {
                $dataMasuk = $barangMasuk
                    ->select("barang_masuk.*, barang.nama_barang, 'masuk' AS jenis")
                    ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
                    ->where("tanggal >=", $start)
                    ->where("tanggal <=", $end)
                    ->findAll();
            } else {
                $dataMasuk = [];
            }

            if ($jenis == 'keluar' || $jenis == 'semua') {
                $dataKeluar = $barangKeluar
                    ->select("barang_keluar.*, barang.nama_barang, 'keluar' AS jenis")
                    ->join('barang', 'barang.id_barang = barang_keluar.id_barang')
                    ->where("tanggal >=", $start)
                    ->where("tanggal <=", $end)
                    ->findAll();
            } else {
                $dataKeluar = [];
            }

            // Gabungkan hasil
            $data['laporan'] = array_merge($dataMasuk, $dataKeluar);
        }

        return view('admin/laporan/inventaris', $data);
    }

    private function getLaporanInventaris($start, $end, $jenis)
    {
        $barangMasuk = new \App\Models\ModelBarangMasuk();
        $barangKeluar = new \App\Models\ModelBarangKeluar();

        if ($jenis == 'masuk' || $jenis == 'semua') {
            $dataMasuk = $barangMasuk
                ->select("barang_masuk.*, barang.nama_barang, 'masuk' AS jenis")
                ->join('barang', 'barang.id_barang = barang_masuk.id_barang')
                ->where("tanggal >=", $start)
                ->where("tanggal <=", $end)
                ->findAll();
        } else {
            $dataMasuk = [];
        }

        if ($jenis == 'keluar' || $jenis == 'semua') {
            $dataKeluar = $barangKeluar
                ->select("barang_keluar.*, barang.nama_barang, 'keluar' AS jenis")
                ->join('barang', 'barang.id_barang = barang_keluar.id_barang')
                ->where("tanggal >=", $start)
                ->where("tanggal <=", $end)
                ->findAll();
        } else {
            $dataKeluar = [];
        }

        // Gabungkan data
        return array_merge($dataMasuk, $dataKeluar);
    }

    public function inventarisExcel()
    {
        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');
        $jenis = $this->request->getGet('jenis');

        $laporan = $this->getLaporanInventaris($start, $end, $jenis);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header Excel
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Jenis');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah');

        $row = 2;
        foreach ($laporan as $data) {
            $sheet->setCellValue("A$row", $data['tanggal']);
            $sheet->setCellValue("B$row", $data['jenis'] == 'masuk' ? 'Barang Masuk' : 'Barang Keluar');
            $sheet->setCellValue("C$row", $data['nama_barang']);
            $sheet->setCellValue("D$row", $data['jumlah']);
            $row++;
        }

        // Set nama file
        $filename = 'Laporan-Inventaris-' . date('YmdHis') . '.xlsx';

        // Output Excel
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($excelOutput);
    }

    public function inventarisPdf()
    {
        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');
        $jenis = $this->request->getGet('jenis');

        $data['laporan'] = $this->getLaporanInventaris($start, $end, $jenis);
        $data['start'] = $start;
        $data['end'] = $end;

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('admin/laporan/pdf_inventaris', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan-Inventaris.pdf');
    }

    public function inventoryExcel()
    {
        $barangModel = new \App\Models\ModelBarang();
        $barang = $barangModel->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // HEADER
        $sheet->setCellValue('A1', 'Kode Barang');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Stok');
        $sheet->setCellValue('D1', 'Satuan');

        $row = 2;
        foreach ($barang as $b) {
            $sheet->setCellValue("A$row", $b['kode_barang']);
            $sheet->setCellValue("B$row", $b['nama_barang']);
            $sheet->setCellValue("C$row", $b['stok']);
            $sheet->setCellValue("D$row", $b['satuan']);
            $row++;
        }

        $filename = 'Laporan-Inventory-' . date('YmdHis') . '.xlsx';

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($excelOutput);
    }

    public function inventoryPdf()
    {
        $barangModel = new \App\Models\ModelBarang();
        $data['barang'] = $barangModel->findAll();

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('admin/laporan/pdf_inventory', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan-Inventory.pdf');
    }


}
