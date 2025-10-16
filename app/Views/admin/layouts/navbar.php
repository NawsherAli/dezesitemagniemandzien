<?php $user = session()->get('user'); ?>

<!-- Navbar -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="<?= site_url('admin/dashboard') ?>">
      The Content Hub
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?= site_url('admin/dashboard') ?>">
      MB
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="ti-view-list"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="<?= base_url('assets/images/profile.png') ?>" alt="profile"/>
          <span class="ms-2"><?= $user['name'] ?? 'User' ?></span> <!-- Show current user -->
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <div class="dropdown-item">
            <strong><?= $user['name'] ?? 'User' ?></strong>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= site_url('admin/logout') ?>">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>
