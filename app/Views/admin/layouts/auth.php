<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $this->renderSection('pageTitle', true) ?> | The Content Hub Admin</title>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/base/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>" />
  <?= $this->renderSection('styles') ?>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <?= $this->renderSection('authContent') ?>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/vendors/base/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets/js/template.js') ?>"></script>
  <script src="<?= base_url('assets/js/todolist.js') ?>"></script>
  <?= $this->renderSection('scripts') ?>
</body>
</html>