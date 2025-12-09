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
                        <h5 class="mb-0">Tambah User</h5>
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body">

                        <!-- ALERT VALIDATION -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif ?>

                        <form action="<?= base_url('user/store') ?>" method="post">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" 
                                           name="username" 
                                           class="form-control"
                                           placeholder="Masukkan username"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" 
                                           name="email" 
                                           class="form-control"
                                           placeholder="Masukkan email"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" 
                                           name="password" 
                                           class="form-control"
                                           placeholder="Minimal 6 karakter"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role User</label>
                                    <select name="role" class="form-select" required>
                                        <option value="" selected disabled>- Pilih Role -</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Simpan User
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
