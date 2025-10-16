<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<style>
  /* Header */
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #0061f2, #00a8ff);
    color: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 25px;
  }

  .page-header h4 {
    font-weight: 600;
    margin: 0;
  }

  .page-header .btn-primary {
    background: #fff;
    color: #0061f2;
    border: none;
    font-weight: 600;
    padding: 10px 20px;
    transition: all 0.3s ease;
  }

  .page-header .btn-primary:hover {
    background: #0061f2;
    color: #fff;
    transform: translateY(-2px);
  }

  /* Card Styling */
  .card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  }

  .card-body {
    padding: 30px;
  }

  /* Form Styling */
  .form-group label {
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
  }

  .form-control {
    border-radius: 10px;
    padding: 10px 12px;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #0061f2;
    box-shadow: 0 0 0 3px rgba(0,97,242,0.15);
  }

  textarea.form-control {
    resize: vertical;
  }

  /* Image Preview */
  #preview {
    width: 220px;
    height: 220px;
    border-radius: 12px;
    border: 3px solid #f0f0f0;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  #preview:hover {
    transform: scale(1.05);
  }

  #getDog {
    margin-top: 5px;
    font-weight: 600;
  }

  /* Submit Button */
  button[type="submit"] {
    background: linear-gradient(135deg, #0061f2, #00a8ff);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    padding: 12px 24px;
    transition: all 0.3s ease;
  }

  button[type="submit"]:hover {
    background: linear-gradient(135deg, #0053c9, #0093e9);
    transform: translateY(-2px);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .page-header {
      flex-direction: column;
      text-align: center;
      gap: 10px;
    }

    #preview {
      width: 100%;
      height: auto;
    }
  }
</style>

<div class="container-fluid px-0">
  <!-- Header -->
  <div class="page-header">
    <h4>📝 Create New Post</h4>
    <a href="<?= site_url('admin/posts') ?>" class="btn btn-primary btn-rounded">
      <i class="mdi mdi-format-list-bulleted"></i> All Posts
    </a>
  </div>

  <!-- Form Card -->
  <div class="card">
    <div class="card-body">
      <form id="postForm" method="post" action="<?= site_url('admin/posts/store') ?>">
        <?= csrf_field() ?>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" required placeholder="Enter post title">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="excerpt">Excerpt</label>
              <textarea name="post_excerpt" rows="3" placeholder="Short summary (optional)" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group mt-3">
          <label for="body">Body</label>
          <textarea name="body" id="editor" rows="6" class="form-control"></textarea>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="form-group">
              <label for="image_url">Image URL</label>
              <input type="text" id="image_url" name="image_url" readonly class="form-control">
              <button type="button" id="getDog" class="btn btn-secondary mt-2">
                🐶 Get Random Dog Image
              </button>
            </div>
          </div>

          <div class="col-md-6 text-center">
            <label>Image Preview</label><br>
            <img id="preview" alt="Dog Preview" src="<?= base_url('assets/images/preview-image.png') ?>">
          </div>
        </div>

        <div class="form-group mt-4">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
          </select>
        </div>

        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save"></i> Save Post
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

  document.getElementById('postForm').addEventListener('submit', function(e) {
    const content = editorInstance.getData().trim();
    if (!content) {
      e.preventDefault();
      alert('Please enter post content before saving.');
    }
  });
</script>

<?= $this->endSection() ?>
