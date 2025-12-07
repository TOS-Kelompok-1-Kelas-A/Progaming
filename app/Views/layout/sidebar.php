<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">

    <!-- LOGO + TEXT -->
    <div 
      class="m-header d-flex align-items-center justify-content-start px-3 py-3"
      style="background:#ffffff; border-bottom:1px solid #ececec;"
    >
      <a href="<?= base_url('/') ?>" class="d-flex align-items-center">

        <!-- TEXT -->
        <span style="
          font-size: 20px;
          font-weight: 700;
          color:#2c3e50;
          letter-spacing: 1px;
        ">
          Inventory
        </span>

      </a>
    </div>

    <!-- MENU -->
    <div class="navbar-content mt-2">
      <ul class="pc-navbar">
        <?= $this->include('layout/menu-list.php') ?>
      </ul>
    </div>

  </div>
</nav>
<!-- [ Sidebar Menu ] end -->
