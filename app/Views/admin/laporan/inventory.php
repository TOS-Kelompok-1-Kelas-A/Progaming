<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layout/header.php') ?>
    <?= $this->include('layout/header-css.php') ?>
</head>

<body>

<?= $this->include('layout/layout-vertical.php') ?>

<div class="pc-container">
    <div class="pc-content">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Laporan Inventory</h5>
                    <small class="text-muted">Laporan stok terbaru semua barang</small>
                </div>

                <!-- Tombol Export (opsional nanti bisa dibuat) -->
                <div>
                    <a href="<?= base_url('laporan/inventoryExcel') ?>" class="btn btn-success btn-sm">
                        <i class="ti ti-file-export"></i> Export Excel
                    </a>

                    <a href="<?= base_url('laporan/inventoryPdf') ?>" class="btn btn-danger btn-sm" target="_blank">
                        <i class="ti ti-file-text"></i> Cetak PDF
                    </a>

                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (!empty($barang)): ?>
                                <?php $no = 1; foreach ($barang as $b): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($b['kode_barang']) ?></td>
                                        <td><?= esc($b['nama_barang']) ?></td>
                                        <td><?= esc($b['stok']) ?></td>
                                        <td><?= esc($b['satuan']) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Tidak ada data barang.
                                    </td>
                                </tr>
                            <?php endif ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->include('layout/footer-js.php') ?>

</body>
</html>
