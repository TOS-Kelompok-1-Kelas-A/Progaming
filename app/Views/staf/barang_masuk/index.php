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

        <!-- ALERT SUCCESS -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif ?>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Barang Masuk</h5>

                <a href="<?= base_url('barang-masuk/create') ?>" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Tambah Barang Masuk
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Dicatat Oleh</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($masuk as $m): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($m['nama_barang']) ?></td>
                                    <td><?= esc($m['jumlah']) ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($m['tanggal'])) ?></td>
                                    <td><?= esc($m['username'] ?? 'Tidak diketahui') ?></td>

                                    <td>
                                        <a href="<?= base_url('barang-masuk/delete/' . $m['id_masuk']) ?>"
                                           onclick="return confirm('Hapus data barang masuk ini?')"
                                           class="btn btn-danger btn-sm">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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
