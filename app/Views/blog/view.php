<?= $this->extend('Layouts/app_layout') ?>

<?= $this->section('title') ?>
  <?= esc($post['title']) ?> - The Content Hub
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Blog Post Header Section -->
<section id="blog-header" class="hero section" style="min-height: 40vh;">
  <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h2 class="text-white mb-3"><?= esc($post['title']) ?></h2>
        <p class="text-white-50">
          <i class="bi bi-calendar-event"></i> Published on:
          <?= esc(date('F jS, Y', strtotime($post['created_at']))) ?>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /Blog Post Header Section -->

<!-- Blog Post Content Section -->
<section id="blog-details-content" class="blog-post-section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <article class="blog-post-card">

          <?php if (!empty($post['image_url'])): ?>
            <div class="post-image-container mb-5">
              <img src="<?= esc($post['image_url']) ?>" class="img-fluid" alt="<?= esc($post['title']) ?>">
            </div>
          <?php endif; ?>

          <div class="post-meta mb-3">
            <span><i class="bi bi-calendar-event"></i> <?= esc(date('F jS, Y', strtotime($post['created_at']))) ?></span>
            <span class="ms-3"><i class="bi bi-person"></i> By Admin</span>
            <!-- TODO: Replace 'Admin' with dynamic author name -->
          </div>

          <div class="post-content mt-4">
            <?= $post['body'] ?>
          </div>

        </article>
      </div>
    </div>
  </div>
</section>
<!-- /Blog Post Content Section -->

<!-- Related Posts Section -->
<section id="related-posts" class="section">
  <div class="container section-title" data-aos="fade-up">
    <h2>More From Our Blog</h2>
    <p>Discover more insightful articles and related topics.</p>
  </div>

  <div class="container">
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
      <?php
      $hasRelatedPosts = false;

      if (!empty($posts)):
        foreach ($posts as $relatedPost):
          if (isset($post['slug']) && $relatedPost['slug'] !== $post['slug']):
            $hasRelatedPosts = true;
      ?>
          <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="img">
                <img src="<?= esc($relatedPost['image_url']) ?>" alt="<?= esc($relatedPost['title']) ?>" class="img-fluid">
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="<?= site_url('post/' . esc($relatedPost['slug'])) ?>">
                    <?= esc($relatedPost['title']) ?>
                  </a>
                </h3>
                <p class="card-text">
                  <?= character_limiter(strip_tags($relatedPost['post_excerpt']), 120) ?>
                </p>
                <a href="<?= site_url('post/' . esc($relatedPost['slug'])) ?>" class="read-more">
                  Read More <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
      <?php
          endif;
        endforeach;
      endif;

      if (!$hasRelatedPosts):
      ?>
        <div class="col-12 text-center">
          <p class="lead text-muted">No other posts available at the moment.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- /Related Posts Section -->

<?= $this->endSection() ?>
