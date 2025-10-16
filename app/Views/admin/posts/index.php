<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>



<div class="container-fluid px-0">
  <!-- Header -->
  <div class="page-header">
    <h4>📝 All Posts</h4>
    <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-primary btn-rounded">
      <i class="mdi mdi-plus"></i> Create New Post
    </a>
  </div>

  <!-- Posts Table -->
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle table-hover">
          <thead>
            <tr>
              <th width="5%">#</th>
              <th width="25%">Title</th>
              <th width="35%">Excerpt</th>
              <th width="15%">Status</th>
              <th width="20%" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($posts)): ?>
              <?php $seq = 1; ?>
              <?php foreach ($posts as $post): ?>
                <tr>
                  <td><?= $seq++ ?></td>
                  <td><strong><?= esc($post['title']) ?></strong></td>
                  <td><?= character_limiter(strip_tags($post['post_excerpt']), 50) ?></td>
                  <td>
                    <?php if ($post['status'] === 'published'): ?>
                      <span class="badge badge-success">Published</span>
                    <?php else: ?>
                      <span class="badge badge-secondary">Draft</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center action-links">
                    <a href="/admin/posts/edit/<?= $post['id'] ?>"><i class="mdi mdi-pencil"></i> Edit</a> |
                    <a href="/admin/posts/delete/<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">
                      <i class="mdi mdi-delete"></i> Delete
                    </a>
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
