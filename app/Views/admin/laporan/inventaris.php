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

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Laporan Inventaris</h5>
                <small class="text-muted">Laporan barang masuk & keluar berdasarkan tanggal</small>
            </div>

            <div class="card-body">
                <form action="<?= base_url('laporan/inventaris') ?>" method="get">
                    <?php
                    $start = $_GET['start'] ?? '';
                    $end   = $_GET['end'] ?? '';
                    $jenis = $_GET['jenis'] ?? '';
                    ?>
                    
                    <div class="row">

                        <!-- Tanggal Mulai -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start" class="form-control" 
                                value="<?= $_GET['start'] ?? '' ?>" required>
                        </div>

                        <!-- Tanggal Akhir -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" name="end" class="form-control" 
                                value="<?= $_GET['end'] ?? '' ?>" required>
                        </div>

                        <!-- Jenis Laporan -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis Laporan</label>
                            <select name="jenis" class="form-select" required>
                                <option value="masuk" <?= (($_GET['jenis'] ?? '') == 'masuk') ? 'selected' : '' ?>>Barang Masuk</option>
                                <option value="keluar" <?= (($_GET['jenis'] ?? '') == 'keluar') ? 'selected' : '' ?>>Barang Keluar</option>
                                <option value="semua" <?= (($_GET['jenis'] ?? '') == 'semua') ? 'selected' : '' ?>>Semua Transaksi</option>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="ti ti-filter"></i> Tampilkan
                    </button>

                    <a href="<?= base_url('laporan/inventaris/pdf?start=' . ($start ?? '') . '&end=' . ($end ?? '') . '&jenis=' . ($jenis ?? '')) ?>"
                    class="btn btn-danger mt-3">
                    <i class="ti ti-file-text"></i> Export PDF
                    </a>

                    <a href="<?= base_url('laporan/inventaris/excel?start=' . ($start ?? '') . '&end=' . ($end ?? '') . '&jenis=' . ($jenis ?? '')) ?>"
                    class="btn btn-success mt-3">
                    <i class="ti ti-file-export"></i> Export Excel
                    </a>

                </form>
            </div>
        </div>

        <!-- HASIL LAPORAN -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Hasil Laporan</h5>
            </div>

            <div class="card-body">

                <?php if (!empty($laporan)): ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; foreach ($laporan as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td>
                                            <?= $row['jenis'] == 'masuk' ? 'Barang Masuk' : 'Barang Keluar' ?>
                                        </td>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>

                        </table>
                    </div>

                <?php else: ?>
                    <p class="text-center text-muted">Tidak ada data untuk periode ini.</p>
                <?php endif ?>

            </div>
        </div>

    </div>
</div>

<?= $this->include('layout/footer-js.php') ?>

</body>
</html>
