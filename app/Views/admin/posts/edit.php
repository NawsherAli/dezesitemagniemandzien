<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-0">
  <!-- Header -->
  <div class="page-header">
    <h4>✏️ Edit Post</h4>
    <a href="<?= site_url('admin/posts') ?>" class="btn btn-primary btn-rounded">
      <i class="mdi mdi-format-list-bulleted"></i> All Posts
    </a>
  </div>

  <!-- Edit Form Card -->
  <div class="card">
    <div class="card-body">
      <form id="postForm" method="post" action="/admin/posts/update/<?= $post['id'] ?>">
        <?= csrf_field() ?>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" required value="<?= esc($post['title']) ?>">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Excerpt</label>
              <textarea name="post_excerpt" rows="3" class="form-control"><?= esc($post['post_excerpt']) ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-group mt-3">
          <label>Body</label>
          <textarea name="body" id="editor" rows="6" class="form-control"><?= esc($post['body']) ?></textarea>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="form-group">
              <label>Image URL</label>
              <input type="text" id="image_url" name="image_url" readonly value="<?= esc($post['image_url']) ?>" class="form-control">
              <button type="button" id="getDog" class="btn btn-secondary mt-2">
                🐶 Get Random Dog Image
              </button>
            </div>
          </div>

          <div class="col-md-6 text-center">
            <label>Image Preview</label><br>
            <img id="preview" alt="Dog Preview" src="<?= esc($post['image_url']) ?>">
          </div>
        </div>

        <div class="form-group mt-4">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="draft" <?= $post['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
            <option value="published" <?= $post['status'] == 'published' ? 'selected' : '' ?>>Published</option>
          </select>
        </div>

        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save"></i> Update Post
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  document.getElementById('getDog').addEventListener('click', async function() {
    const res = await fetch('https://dog.ceo/api/breeds/image/random');
    const data = await res.json();
    if (data.status === 'success') {
      document.getElementById('image_url').value = data.message;
      const img = document.getElementById('preview');
      img.src = data.message;
      img.style.display = 'block';
    } else {
      alert('Could not fetch dog image.');
    }
  });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
  let editorInstance;
  ClassicEditor
    .create(document.querySelector('#editor'), {
      ckfinder: { uploadUrl: '<?= site_url('admin/posts/upload') ?>' }
    })
    .then(editor => { editorInstance = editor; })
    .catch(error => { console.error(error); });

  document.getElementById('postForm').addEventListener('submit', function (e) {
    const content = editorInstance.getData().trim();
    if (!content) {
      e.preventDefault();
      alert('Please enter post content before saving.');
    }
  });
</script>

<?= $this->endSection() ?>
