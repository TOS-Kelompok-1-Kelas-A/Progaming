<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layout/header.php') ?>
    <?= $this->include('layout/header-css.php') ?>
</head>

<body>

    <!-- SIDEBAR + NAVBAR -->
    <?= $this->include('layout/layout-vertical.php') ?>

    <!-- PAGE CONTAINER -->
    <div class="pc-container">
        <div class="pc-content">

                <!-- ALERT SUCCESS -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif ?>
            <!-- CARD USER LIST -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Manajemen User</h5>
                    <a href="<?= base_url('user/create') ?>" class="btn btn-primary btn-sm">
                        <i class="ti ti-plus"></i> Tambah User
                    </a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table text-center">
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($users)) : ?>
                                    <?php $no = 1; foreach ($users as $u) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= esc($u['username']) ?></td>
                                            <td><?= esc($u['email']) ?></td>
                                            <td class="text-center">
                                                <?php if ($u['role'] == 'admin') : ?>
                                                    <span class="badge bg-primary">Admin</span>
                                                <?php else : ?>
                                                    <span class="badge bg-success">Staff</span>
                                                <?php endif ?>
                                            </td>

                                            <td class="text-center">
                                                <a href="<?= base_url('user/edit/' . $u['id_user']) ?>" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete-user"
                                                        data-id="<?= $u['id_user'] ?>"
                                                        data-username="<?= $u['username'] ?>">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Tidak ada data user.</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <!-- MODAL KONFIRMASI DELETE USER -->
    <div class="modal fade" id="modalDeleteUser" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus user <strong id="delete-username"></strong> ?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a id="btn-delete-confirm" href="#" class="btn btn-danger">Ya, Hapus</a>
                </div>

            </div>
        </div>
    </div>


    <?= $this->include('layout/footer-js.php') ?>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // Saat tombol delete diklik
    document.querySelectorAll(".btn-delete-user").forEach(btn => {
        btn.addEventListener("click", function () {

            let userId = this.dataset.id;
            let username = this.dataset.username;

            // Isi username ke modal
            document.getElementById("delete-username").innerText = username;

            // Set URL delete
            document.getElementById("btn-delete-confirm").setAttribute("href",
                "<?= base_url('user/delete/') ?>" + userId
            );

            // Show modal (Bootstrap 5)
            let modal = new bootstrap.Modal(document.getElementById('modalDeleteUser'));
            modal.show();
        });
    });

});
</script>


</body>
</html>
