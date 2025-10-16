<header id="header" class="header d-flex align-items-center"  >
  <div class="container-fluid d-flex align-items-center justify-content-between">

    <a href="<?= site_url('/') ?>" class="logo d-flex align-items-center">
      <h1 class="sitename">The Content Hub</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?= site_url('/') ?>" class="<?= service('uri')->getPath() == '/' ? 'active' : '' ?>">Home</a></li>
        <li><a href="<?= site_url('/#our-blogs') ?>" class="<?= strpos(service('uri')->getPath(), '#our-blogs') !== false || (service('uri')->getPath() == '/' && isset($currentSection) && $currentSection == 'our-blogs') ? 'active' : '' ?>">Our Blogs</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>