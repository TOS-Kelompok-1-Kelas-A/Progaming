<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('layout/header.php') ?>
    <?= $this->include('layout/header-css.php') ?>
</head>

<body>
<div class="auth-main">
  <div class="auth-wrapper v3 mt-n1 mt-md-n4 mt-lg-n5">
    <div class="auth-form">
      <div class="auth-header"></div>

      <div class="card my-5">
        <div class="card-body">

          <!-- Judul -->
          <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="mb-0"><b>Login</b></h3>
          </div>

          <!-- Pesan Error -->
          <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error'); ?>
            </div>
          <?php endif; ?>

          <!-- FORM LOGIN -->
          <form action="<?= base_url('/login'); ?>" method="POST">

            <div class="form-group mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <div class="d-flex mt-1 justify-content-between">
              <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1">
                <label class="form-check-label text-muted" for="customCheckc1">Keep me signed in</label>
              </div>
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>

          </form>
          <!-- END FORM LOGIN -->

        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->include('layout/footer-js.php') ?>
</body>

</html>
