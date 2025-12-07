<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>

  <?= $this->include('layout/header.php') ?>
  <?= $this->include('layout/header-css.php') ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <?= base_url('layout/loader.php') ?>
  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header">
        </div>
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Sign up</b></h3>
              <a href="<?= base_url('/') ?>" class="link-primary">Already have an account?</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label class="form-label">Name*</label>
                  <input type="text" class="form-control" placeholder="You Name">
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Division</label>
              <input type="text" class="form-control" placeholder="Division">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Email Address*</label>
              <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
            <div class="d-grid mt-3">
              <button type="button" class="btn btn-primary">Create Account</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <?= $this->include('layout/footer-js.php') ?>
</body>
<!-- [Body] end -->

</html>