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
                <h5 class="mb-0">Data Barang</h5>
                <a href="<?= base_url('barang/create') ?>" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Tambah Barang
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($barang as $b): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($b['kode_barang']) ?></td>
                                    <td><?= esc($b['nama_barang']) ?></td>
                                    <td><?= esc($b['stok']) ?></td>
                                    <td><?= esc($b['satuan']) ?></td>

                                    <td>
                                        <a href="<?= base_url('barang/edit/' . $b['id_barang']) ?>" 
                                           class="btn btn-warning btn-sm">
                                            <i class="ti ti-edit"></i>
                                        </a>

                                        <a href="<?= base_url('barang/delete/' . $b['id_barang']) ?>"
                                           onclick="return confirm('Hapus barang ini?')"
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
