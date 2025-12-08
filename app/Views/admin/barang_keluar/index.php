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

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th width="120">Aksi</th>
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
                                            <button 
                                                class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteKeluar"
                                                data-id="<?= $row['id_keluar'] ?>"
                                            >
                                                <i class="ti ti-trash"></i>
                                            </button>
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

<!-- MODAL HAPUS DATA  -->
<div class="modal fade" id="modalDeleteKeluar" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p class="mb-0">Apakah Anda yakin ingin menghapus data barang keluar ini?</p>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

        <a id="btn-delete-keluar" href="#" class="btn btn-danger">
          Ya, Hapus
        </a>
      </div>

    </div>
  </div>
</div>

<?= $this->include('layout/footer-js.php') ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var modalDelete = document.getElementById('modalDeleteKeluar');

    modalDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');

        var deleteBtn = document.getElementById('btn-delete-keluar');
        deleteBtn.href = "/barang-keluar/delete/" + id;
    });

});
</script>

</body>
</html>
