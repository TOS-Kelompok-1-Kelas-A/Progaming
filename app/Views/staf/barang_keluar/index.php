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
                <h5 class="mb-0">Daftar Barang Keluar</h5>
                <a href="<?= base_url('barang-keluar/create') ?>" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Tambah Barang Keluar
                </a>
            </div>

            <div class="card-body">

                <!-- ALERT SUCCESS -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif ?>

                <!-- ALERT ERROR -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif ?>

                <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($keluar)): ?>
                <?php $no = 1; foreach ($keluar as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_barang']) ?></td>
                        <td><?= esc($row['jumlah']) ?></td>
                        <td><?= esc($row['tanggal']) ?></td>

                        <td class="text-center">
                            <a href="<?= base_url('barang-keluar/delete/' . $row['id_keluar']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="ti ti-trash"></i> 
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data barang keluar.</td>
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
