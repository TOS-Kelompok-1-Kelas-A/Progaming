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
                        <h5 class="mb-0">Edit User</h5>
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body">

                        <!-- ALERT VALIDATION -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif ?>

                        <form action="<?= base_url('user/update/' . $user['id_user']) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">

                                <!-- USERNAME -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text"
                                           name="username"
                                           class="form-control"
                                           value="<?= esc($user['username']) ?>"
                                           required>
                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="<?= esc($user['email']) ?>"
                                           required>
                                </div>

                                <!-- PASSWORD -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="Kosongkan jika tidak diubah">
                                    <small class="text-muted">Abaikan jika tidak ingin mengganti password.</small>
                                </div>

                                <!-- ROLE -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role User</label>
                                    <select name="role" class="form-select" required>
                                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>
                                            Admin
                                        </option>
                                        <option value="staff" <?= $user['role'] === 'staff' ? 'selected' : '' ?>>
                                            Staff
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <!-- BUTTON SUBMIT -->
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Update User
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
