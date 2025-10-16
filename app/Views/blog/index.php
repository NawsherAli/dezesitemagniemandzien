C:\xampp\htdocs\The Content Hub\app\Views\blog\index.php
<?= $this->extend('Layouts/app_layout') ?>

<?= $this->section('title') ?>
  The Content Hub - Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <!-- Hero Section -->
  <section id="hero" class="hero section">
    <!-- Image handled by CSS background-image for better overlay control -->
    <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <h2 class="text-white mb-4">Welcome to The Content Hub</h2>
          <p class="text-white lead mb-5">Discover insightful articles, inspiring stories, and engaging content that fuels your curiosity and expands your knowledge.</p>
          <a href="#our-blogs" class="btn-get-started">Explore Our Latest Blogs</a>
        </div>
      </div>
    </div>
  </section><!-- /Hero Section -->

  <!-- About Section -->
  <section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
      <h2>About The Content Hub</h2>
      <p>Your go-to source for knowledge and inspiration across a spectrum of topics.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-5 align-items-center">
        <div class="col-lg-6 order-2 order-lg-1 content">
          <h3>Crafting engaging content and fostering a vibrant community for curious minds.</h3>
          <p class="fst-italic">
            At The Content Hub, we believe in the transformative power of well-crafted stories and informative articles. Our mission is to provide
            a dynamic platform where ideas flourish, critical thinking is encouraged, and readers can find valuable insights to enrich their lives.
          </p>
          <ul class="list-unstyled mt-4">
            <li><i class="bi bi-check-circle-fill"></i> <span>Explore a diverse range of topics, from cutting-edge technology to captivating lifestyle trends and profound personal development.</span></li>
            <li><i class="bi bi-check-circle-fill"></i> <span>Engage with expertly written articles, thought-provoking discussions, and fresh perspectives from our dedicated contributors.</span></li>
            <li><i class="bi bi-check-circle-fill"></i> <span>Join a community-driven platform designed for sharing knowledge, fostering learning, and connecting with like-minded individuals.</span></li>
          </ul>
          <p class="mt-4">
            We are passionate about connecting with our readers and fostering a space for meaningful engagement and continuous learning.
            Join us on this exciting journey of discovery and knowledge.
          </p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="<?= base_url('assets/user/img/about.jpg')?>" class="img-fluid" alt="A person reading a book, symbolizing knowledge and learning">
        </div>
      </div>
    </div>
  </section><!-- /About Section -->

  <!-- Our Blog Section-->
  <section id="our-blogs" class="section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Our Latest Blogs</h2>
      <p>Dive into our most recent articles and popular posts from our vibrant community.</p>
    </div>

    <div class="container">
      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        <?php if (!empty($posts)): ?>
          <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="img">
                  <img src="<?= esc($post['image_url']) ?>" alt="<?= esc($post['title']) ?>" class="img-fluid">
                </div>
                <div class="card-body">
                  <h3 class="card-title">
                    <a href="<?= site_url('post/' . esc($post['slug'])) ?>"><?= esc($post['title']) ?></a>
                  </h3>
                  <p class="card-text"><?= character_limiter(strip_tags($post['post_excerpt']), 120) ?></p>
                  <a href="<?= site_url('post/' . esc($post['slug'])) ?>" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center">
            <p class="lead text-muted">No published posts yet. Check back soon for exciting new content!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section><!-- /Our Blog Section -->
<?= $this->endSection() ?>