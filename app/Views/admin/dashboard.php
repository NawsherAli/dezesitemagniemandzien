<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-0">
  <!-- Header -->
  <div class="dashboard-header mb-4">
    <h4>👋 Welcome to Your Dashboard</h4>
    <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-primary btn-rounded">
      <i class="mdi mdi-plus"></i> Create New Post
    </a>
  </div>

  <!-- Stats Cards -->
  <div class="row g-4 mb-4">
    <!-- Total Posts -->
    <div class="col-md-4 col-sm-6">
      <div class="card dashboard-card">
        <div class="card-body text-center">
          <h4>Total Posts</h4>
          <h2><?= esc($totalPosts) ?></h2>
        </div>
      </div>
    </div>

    <!-- Published Posts -->
    <div class="col-md-4 col-sm-6">
      <div class="card dashboard-card">
        <div class="card-body text-center">
          <h4 class="text-success">Published</h4>
          <h2 class="text-success"><?= esc($publishedPosts) ?></h2>
        </div>
      </div>
    </div>

    <!-- Draft Posts -->
    <div class="col-md-4 col-sm-6">
      <div class="card dashboard-card">
        <div class="card-body text-center">
          <h4 class="text-warning">Drafts</h4>
          <h2 class="text-warning"><?= esc($draftPosts) ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Latest Posts (up to 5) -->
  <div class="card">
    <div class="card-body">
      <h4 class="mb-3">📝 Latest Posts</h4>
      <div class="table-responsive">
        <table class="table align-middle table-hover">
          <thead>
            <tr>
              <th width="5%">#</th>
              <th width="30%">Title</th>
              <th width="40%">Excerpt</th>
              <th width="15%">Status</th>
              <th width="10%" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($latestPosts)): ?>
              <?php $seq = 1; ?>
              <?php foreach ($latestPosts as $post): ?>
                <tr>
                  <td><?= $seq++ ?></td>
                  <td><strong><?= esc($post['title']) ?></strong></td>
                  <td>
                    <?= esc(
                      strlen(strip_tags($post['post_excerpt'])) > 50 
                        ? substr(strip_tags($post['post_excerpt']), 0, 50) . '...' 
                        : strip_tags($post['post_excerpt'])
                    ) ?>
                  </td>
                  <td>
                    <?php if ($post['status'] === 'published'): ?>
                      <span class="badge badge-success">Published</span>
                    <?php else: ?>
                      <span class="badge badge-secondary">Draft</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <a href="<?= site_url('admin/posts/edit/'.$post['id']) ?>"><i class="mdi mdi-pencil text-info"></i></a>
                    <a href="<?= site_url('admin/posts/delete/'.$post['id']) ?>" onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete text-danger"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center text-muted">No posts found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
