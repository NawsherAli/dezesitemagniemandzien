<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $this->renderSection('title') ? $this->renderSection('title') : 'The Content Hub' ?></title>

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/user/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/user/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/user/vendor/aos/aos.css') ?>" rel="stylesheet">

  <!-- Main CSS File -->
  <!-- You might want to keep a separate main.css for general styles,
       but for this re-write, I'm consolidating the custom styles here for clarity. -->
  <link href="<?= base_url('assets/user/css/main.css') ?>" rel="stylesheet">

  <style>
    :root {
      --primary-color: #4A90E2; /* A professional blue */
      --secondary-color: #6C757D; /* Muted grey for secondary elements */
      --text-color: #343A40; /* Darker grey for main text */
      --heading-color: #212529; /* Even darker for headings */
      --light-bg: #F8F9FA; /* Very light grey background */
      --white-bg: #FFFFFF;
      --border-color: #DEE2E6; /* Light border */
      --shadow-light: rgba(0, 0, 0, 0.08); /* Subtle shadow */
      --gradient-start: #4A90E2;
      --gradient-end: #614BE2;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--text-color);
      background-color: var(--light-bg);
      line-height: 1.6;
    }

    a {
      color: var(--primary-color);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #3a7bd5; /* Slightly darker primary */
      text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Playfair Display', serif;
      color: var(--heading-color);
      margin-bottom: 1rem;
      line-height: 1.3;
    }

    .section {
      padding: 80px 0;
      overflow: hidden;
      background-color: var(--white-bg);
    }

    .section:nth-of-type(even) {
      background-color: var(--light-bg);
    }

    .section-title {
      text-align: center;
      padding-bottom: 40px;
    }

    .section-title h2 {
      font-size: 2.5rem;
      font-weight: 700;
      position: relative;
      display: inline-block;
      margin-bottom: 1rem;
    }

    .section-title h2::after {
      content: '';
      position: absolute;
      display: block;
      width: 60px;
      height: 4px;
      background: var(--primary-color);
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .section-title p {
      margin-top: 15px;
      margin-bottom: 0;
      color: var(--secondary-color);
      font-size: 1.1rem;
    }

    /* Header Styles */
    .header {
      background-color: var(--white-bg);
      box-shadow: 0 2px 15px var(--shadow-light);
      padding: 20px 0;
      transition: all 0.4s ease;
    }

    .header.scrolled {
      padding: 12px 0;
    }

    .header .sitename {
      color: var(--heading-color);
      font-size: 1.8rem;
      font-weight: 700;
      font-family: 'Playfair Display', serif;
    }

    .navmenu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .navmenu a {
      display: block;
      padding: 10px 20px;
      font-size: 1rem;
      font-weight: 500;
      color: var(--text-color);
      position: relative;
    }

    .navmenu a:hover,
    .navmenu .active {
      color: var(--primary-color);
    }

    .navmenu a::after {
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        background: var(--primary-color);
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .navmenu a:hover::after,
    .navmenu .active::after {
        width: 80%;
    }

    /* Hero Section */
    .hero {
      position: relative;
      padding: 150px 0;
      color: #fff;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
      overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('<?= base_url('assets/user/img/hero-bg.jpg')?>');
        background-size: cover;
        background-position: center;
        filter: brightness(0.4);
        z-index: 0;
    }

    .hero .container {
      position: relative;
      z-index: 1;
    }

    .hero h2 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #fff;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 2.5rem;
      color: rgba(255, 255, 255, 0.9);
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .hero .btn-get-started {
      background-color: var(--primary-color);
      color: #fff;
      padding: 15px 40px;
      border-radius: 50px;
      transition: all 0.3s ease;
      font-weight: 600;
      border: 2px solid var(--primary-color);
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .hero .btn-get-started:hover {
      background-color: transparent;
      border-color: #fff;
      color: #fff;
      transform: translateY(-3px);
    }

    /* About Section */
    .about .content h3 {
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }

    .about .content ul {
      list-style: none;
      padding: 0;
      margin-top: 1.5rem;
    }

    .about .content ul li {
      padding-bottom: 10px;
      display: flex;
      align-items: flex-start;
      font-size: 1.05rem;
      color: var(--text-color);
    }

    .about .content ul i {
      font-size: 22px;
      padding-right: 10px;
      color: var(--primary-color);
      line-height: 1;
    }

    .about img {
        border-radius: 12px;
        box-shadow: 0 8px 30px var(--shadow-light);
    }

    /* Card Styles (for blogs) */
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 20px var(--shadow-light);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
      background-color: var(--white-bg);
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 1px solid var(--border-color);
    }

    .card:hover {
      transform: translateY(-7px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .card .img {
      height: 250px;
      overflow: hidden;
      border-radius: 12px 12px 0 0;
    }

    .card .img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .card:hover .img img {
      transform: scale(1.08);
    }

    .card-body {
      padding: 25px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .card .card-title {
      font-size: 1.6rem;
      font-weight: 600;
      margin-bottom: 15px;
      line-height: 1.4;
    }

    .card .card-title a {
      color: var(--heading-color);
      transition: color 0.3s ease;
    }

    .card .card-title a:hover {
      color: var(--primary-color);
    }

    .card .card-text {
      font-size: 1rem;
      color: var(--secondary-color);
      flex-grow: 1;
      margin-bottom: 20px;
    }

    .card .read-more {
      display: inline-flex;
      align-items: center;
      color: var(--primary-color);
      font-weight: 500;
      transition: transform 0.3s ease;
    }

    .card .read-more i {
      margin-left: 8px;
      transition: transform 0.3s ease;
    }

    .card .read-more:hover {
      transform: translateX(5px);
    }

    .card .read-more:hover i {
      transform: translateX(5px);
    }

    /* Blog Post Detail Section */
    .blog-post-section {
      padding: 60px 0;
      background-color: var(--white-bg);
    }

    .blog-post-card {
      background-color: var(--white-bg);
      border-radius: 12px;
      box-shadow: 0 8px 30px var(--shadow-light);
      padding: 30px;
      border: 1px solid var(--border-color);
    }

    .post-image-container {
      margin-bottom: 30px;
      border-radius: 8px;
      overflow: hidden;
    }

    .post-image-container img {
      width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 8px;
    }

    .post-meta {
      font-size: 0.95rem;
      color: var(--secondary-color);
      margin-bottom: 20px;
      display: flex;
      gap: 20px;
    }

    .post-meta i {
      margin-right: 5px;
      color: var(--primary-color);
    }

    .post-title {
      font-size: 2.8rem;
      font-weight: 700;
      color: var(--heading-color);
      margin-bottom: 30px;
      line-height: 1.2;
    }

    .post-content {
      font-size: 1.1rem;
      line-height: 1.8;
      color: var(--text-color);
    }

    .post-content p {
      margin-bottom: 1.5rem;
    }

    .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 {
        font-family: 'Inter', sans-serif;
        color: var(--heading-color);
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .post-content ul, .post-content ol {
        margin-bottom: 1.5rem;
        padding-left: 20px;
    }

    .post-content ul li {
        margin-bottom: 8px;
    }

    /* Footer Styles */
    .footer {
      background-color: #212529; /* Dark, nearly black */
      color: #E9ECEF;
      padding: 60px 0;
      text-align: center;
    }

    .footer .sitename {
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 20px;
      font-family: 'Playfair Display', serif;
    }

    .footer p {
      font-size: 1rem;
      margin-bottom: 30px;
      color: #ADB5BD;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .footer .social-links a {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 45px;
      height: 45px;
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      border-radius: 50%;
      margin: 0 8px;
      transition: all 0.3s ease;
      font-size: 1.2rem;
    }

    .footer .social-links a:hover {
      background-color: var(--primary-color);
      transform: translateY(-3px);
    }

    /* Scroll Top Button */
    #scroll-top {
      background-color: var(--primary-color);
      color: #fff;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      right: 25px;
      bottom: 25px;
      font-size: 28px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    #scroll-top:hover {
      background-color: #3a7bd5;
      transform: translateY(-3px);
    }

    #preloader {
      background: var(--primary-color);
      z-index: 999999;
    }

    /* Mobile Navigation */
    @media (max-width: 1200px) {
      .navmenu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 300px;
        height: 100vh;
        background: var(--white-bg);
        z-index: 999;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding-top: 60px;
        box-shadow: -5px 0 15px rgba(0,0,0,0.1);
        transition: right 0.4s ease;
      }

      .navmenu.show {
        right: 0;
      }

      .navmenu ul {
        flex-direction: column;
        width: 100%;
        padding-top: 20px;
      }

      .navmenu ul li {
        width: 100%;
      }

      .navmenu a {
        padding: 15px 25px;
        color: var(--heading-color);
        border-bottom: 1px solid var(--light-bg);
      }

      .navmenu a:hover::after,
      .navmenu .active::after {
          width: 0; /* Remove underline for mobile */
      }

      .mobile-nav-toggle {
        display: block !important;
        font-size: 28px;
        color: var(--heading-color);
        cursor: pointer;
        line-height: 0;
        z-index: 9999;
        transition: color 0.3s ease;
      }

      .mobile-nav-toggle:hover {
          color: var(--primary-color);
      }

      .mobile-nav-active body {
        overflow: hidden;
      }

      .mobile-nav-toggle.bi-x {
          color: var(--primary-color);
      }
    }
  </style>

  <?= $this->renderSection('additional_css') ?>
</head>

<body class="index-page">

  <?= $this->include('Layouts/header') ?>

  <main class="main">
    <?= $this->renderSection('content') ?>
  </main>

  <?= $this->include('Layouts/footer') ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?= base_url('assets/user/vendor/aos/aos.js')?>"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('assets/user/js/main.js')?>"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile nav toggle
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const navmenu = document.querySelector('#navmenu');
        const body = document.querySelector('body');

        if (mobileNavToggle) {
            mobileNavToggle.addEventListener('click', function (e) {
                navmenu.classList.toggle('show');
                body.classList.toggle('mobile-nav-active');
                this.classList.toggle('bi-list');
                this.classList.toggle('bi-x');
            });
        }

        // Header scrolled class
        function toggleScrolled() {
            const header = document.querySelector('#header');
            if (header) {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        }
        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);

        // Preloader
        const preloader = document.querySelector('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove();
            });
        }

        // AOS initialization
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Scroll Top Button
        const scrollTop = document.querySelector('#scroll-top');
        if (scrollTop) {
            const toggleScrollTop = function() {
                if (window.scrollY > 100) {
                    scrollTop.classList.add('active');
                } else {
                    scrollTop.classList.remove('active');
                }
            }
            window.addEventListener('load', toggleScrollTop);
            document.addEventListener('scroll', toggleScrollTop);
            scrollTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
  </script>

  <?= $this->renderSection('additional_js') ?>

</body>

</html>