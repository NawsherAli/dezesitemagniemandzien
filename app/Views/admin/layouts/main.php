<?= $this->include('admin/layouts/header') ?>

<!-- Navbar -->
<?= $this->include('admin/layouts/navbar') ?? '' ?>

<div class="container-fluid page-body-wrapper">
  <!-- Sidebar -->
  <?= $this->include('admin/layouts/sidebar') ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
      <?php endif; ?>
      <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('admin/layouts/footer') ?>
  </div>
</div>
