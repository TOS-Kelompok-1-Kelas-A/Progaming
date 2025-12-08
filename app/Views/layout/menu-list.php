
<?php $role = session()->get('role'); ?>

<?php if ($role == 'admin'): ?>

    <li class="pc-item">
        <a href="<?= base_url('dashboard/admin') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
        <span class="pc-mtext">Dashboard</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Manajemen User</label>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('user') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-users"></i></span>
        <span class="pc-mtext">Data User</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Inventaris</label>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('barang') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-box"></i></span>
        <span class="pc-mtext">Data Barang</span>
        </a>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('barang-masuk') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-arrow-up"></i></span>
        <span class="pc-mtext">Barang Masuk</span>
        </a>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('barang-keluar') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-arrow-down"></i></span>
        <span class="pc-mtext">Barang Keluar</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Laporan</label>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('laporan/inventaris') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-file-text"></i></span>
        <span class="pc-mtext">Laporan Inventaris</span>
        </a>
    </li>

    <li class="pc-item">
      <a href="<?= base_url('laporan') ?>" class="pc-link">
      <span class="pc-micon"><i class="ti ti-file-text"></i></span>
      <span class="pc-mtext">Laporan Inventory</span>
      </a>
    </li>

<?php endif; ?>

  <?php if ($role == 'staff'): ?>

      <li class="pc-item">
          <a href="<?= base_url('dashboard/staf') ?>" class="pc-link">
          <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
          <span class="pc-mtext">Dashboard</span>
          </a>
      </li>

      <li class="pc-item pc-caption">
          <label>Transaksi</label>
      </li>

    <li class="pc-item">
        <a href="<?= base_url('barang-masuk') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-arrow-up"></i></span>
        <span class="pc-mtext">Barang Masuk</span>
        </a>
    </li>

    <li class="pc-item">
        <a href="<?= base_url('barang-keluar') ?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-arrow-down"></i></span>
        <span class="pc-mtext">Barang Keluar</span>
        </a>
    </li>
    
  <?php endif; ?>

