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

        <!-- STATISTIK -->
        <div class="row">

            <!-- TOTAL BARANG -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Total Barang</h6>
                        <h4 class="mb-0"><?= $total_barang ?? 0 ?></h4>
                    </div>
                </div>
            </div>

            <!-- BARANG MASUK (BULAN INI) -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Barang Masuk (Bulan Ini)</h6>
                        <h4 class="mb-0"><?= $total_masuk ?? 0 ?></h4>
                    </div>
                </div>
            </div>

            <!-- BARANG KELUAR (BULAN INI) -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Barang Keluar (Bulan Ini)</h6>
                        <h4 class="mb-0"><?= $total_keluar ?? 0 ?></h4>
                    </div>
                </div>
            </div>

            <!-- STOK HAMPIR HABIS -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Stok Hampir Habis</h6>
                        <h4 class="mb-0"><?= $stok_limit ?? 0 ?></h4>
                    </div>
                </div>
            </div>

        </div>


        <!-- BARANG MASUK TERBARU -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Barang Masuk Terbaru</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">

                    <?php if (!empty($recent_masuk)) : ?>
                        <?php foreach ($recent_masuk as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><?= $row['nama_barang'] ?> (<?= $row['jumlah'] ?>)</span>
                                <small><?= $row['tanggal'] ?></small>
                            </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <li class="list-group-item">Tidak ada data.</li>
                    <?php endif ?>

                </ul>
            </div>
        </div>

        <!-- BARANG KELUAR TERBARU -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Barang Keluar Terbaru</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">

                    <?php if (!empty($recent_keluar)) : ?>
                        <?php foreach ($recent_keluar as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><?= $row['nama_barang'] ?> (<?= $row['jumlah'] ?>)</span>
                                <small><?= $row['tanggal'] ?></small>
                            </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <li class="list-group-item">Tidak ada data.</li>
                    <?php endif ?>

                </ul>
            </div>
        </div>

    </div>
</div>

<?= $this->include('layout/footer-js.php') ?>

</body>
</html>
