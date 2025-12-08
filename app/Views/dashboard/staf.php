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

        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Total Barang</h6>
                        <h4><?= $total_barang ?? 0 ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Barang Masuk Yang Anda Input</h6>
                        <h4><?= $masuk_hari_ini ?? 0 ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Barang Keluar Yang Anda Input</h6>
                        <h4><?= $keluar_hari_ini ?? 0 ?></h4>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Barang Masuk Terbaru</h5>
            </div>
            <div class="card-body">

                <ul class="list-group">
                    <?php if (!empty($recent_masuk)): ?>
                        <?php foreach ($recent_masuk as $row): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?= $row['nama_barang'] ?> (<?= $row['jumlah'] ?>)</span>
                                <small><?= $row['tanggal'] ?></small>
                            </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <li class="list-group-item text-muted">Tidak ada data.</li>
                    <?php endif ?>
                </ul>

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Barang Keluar Terbaru</h5>
            </div>
            <div class="card-body">

                <ul class="list-group">
                    <?php if (!empty($recent_keluar)): ?>
                        <?php foreach ($recent_keluar as $row): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?= $row['nama_barang'] ?> (<?= $row['jumlah'] ?>)</span>
                                <small><?= $row['tanggal'] ?></small>
                            </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <li class="list-group-item text-muted">Tidak ada data.</li>
                    <?php endif ?>
                </ul>

            </div>
        </div>

    </div>
</div>

<?= $this->include('layout/footer-js.php') ?>
</body>
</html>
