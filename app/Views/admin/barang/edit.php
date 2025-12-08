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

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Barang</h5>
                        <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body">

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif ?>

                        <form action="<?= base_url('barang/update/' . $barang['id_barang']) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kode Barang</label>
                                    <input type="text"
                                           name="kode_barang"
                                           value="<?= esc($barang['kode_barang']) ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Barang</label>
                                    <input type="text"
                                           name="nama_barang"
                                           value="<?= esc($barang['nama_barang']) ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number"
                                           name="stok"
                                           value="<?= esc($barang['stok']) ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Satuan</label>
                                    <input type="text"
                                           name="satuan"
                                           value="<?= esc($barang['satuan']) ?>"
                                           class="form-control"
                                           required>
                                </div>

                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Update Barang
                                </button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->include('layout/footer-js.php') ?>

</body>
</html>
