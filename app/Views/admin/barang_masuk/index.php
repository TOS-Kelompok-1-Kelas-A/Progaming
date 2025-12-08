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
                    <table class="table table-bordered table-striped align-middle">
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

                                    <td class="text-center">
                                        <button 
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"
                                            data-id="<?= $m['id_masuk'] ?>"
                                        >
                                            <i class="ti ti-trash"></i>
                                        </button>
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

<!-- MODAL HAPUS -->
<div class="modal fade" id="modalDelete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p class="mb-0">Apakah Anda yakin ingin menghapus data barang masuk ini?</p>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

        <a id="btn-delete" href="#" class="btn btn-danger">
          Ya, Hapus
        </a>
      </div>

    </div>
  </div>
</div>

<!-- LOAD JS -->
<?= $this->include('layout/footer-js.php') ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var modalDelete = document.getElementById('modalDelete');

    modalDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');

        // Set URL penghapusan
        var deleteBtn = document.getElementById('btn-delete');
        deleteBtn.href = "/barang-masuk/delete/" + id;
    });

});
</script>

</body>
</html>
