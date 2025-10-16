<?= $this->extend('admin/layouts/auth') ?>

<?= $this->section('pageTitle') ?>Login<?= $this->endSection() ?>

<?= $this->section('styles') ?>
  <style>
    .auth-form-light {
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      padding: 3rem 3.5rem;
    }
    .brand-logo h3 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #007bff; /* Primary color */
      margin-bottom: 2rem;
      text-align: center;
    }
    .auth-form-light h4 {
      font-weight: 600;
      color: #333;
      text-align: center;
      margin-bottom: 0.5rem;
    }
    .auth-form-light h6 {
      font-weight: 400;
      color: #777;
      text-align: center;
      margin-bottom: 2rem;
    }
    .form-group .form-control-lg {
      border-radius: 8px;
      padding: 0.8rem 1.2rem;
      font-size: 1rem;
    }
    .auth-form-btn {
      border-radius: 8px;
      padding: 0.75rem 1.5rem;
      font-size: 1.1rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      background-color: #007bff; /* Primary color */
      border-color: #007bff;
    }
    .auth-form-btn:hover {
      background-color: #303f9f; /* Darker shade on hover */
      border-color: #303f9f;
    }
    .alert-danger {
      background-color: #ffebee;
      color: #d32f2f;
      border-color: #ef9a9a;
      padding: 10px 15px;
      border-radius: 5px;
      margin-bottom: 15px;
      text-align: center;
      font-weight: 500;
    }
  </style>
<?= $this->endSection() ?>

<?= $this->section('authContent') ?>
  <div class="row w-100 mx-0">
    <div class="col-lg-5 mx-auto">
      <div class="auth-form-light text-left">
        <h4>Welcome Back!</h4>
        <h6 class="font-weight-light">Sign in to your admin dashboard.</h6>
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger" role="alert">
            <?= esc(session()->getFlashdata('error')) ?>
          </div>
        <?php endif; ?>
        <form class="pt-3" method="post" action="<?= site_url('admin/login') ?>">
          <?= csrf_field() ?>
          <div class="form-group">
            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required value="<?= old('username') ?>">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
          </div>
          <div class="mt-3 text-end">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>