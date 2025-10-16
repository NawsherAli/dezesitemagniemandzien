<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PostModel;

class PostsController extends ResourceController
{
    protected $modelName = PostModel::class;
    protected $format    = 'json';

    /**
     * GET /api/posts
     * Returns a JSON list of published posts.
     * Supports optional pagination via ?page=<n>&per_page=<n>
     */
    public function index()
    {
        // Read optional pagination params
        $page     = (int) $this->request->getGet('page') ?: 1;
        $perPage  = (int) $this->request->getGet('per_page') ?: 1000; // default large to return all

        // If you want to always return all published posts, set large per_page above.
        $postModel = new PostModel();

        // Use CodeIgniter model paginate (keeps it simple); but we'll fetch manually to transform
        $builder = $postModel->where('status', 'published')->orderBy('created_at', 'DESC');

        // If you want pagination, uncomment next two lines and use $builder->paginate($perPage, 'group', $page);
        // $items = $builder->paginate($perPage, 'default', $page);
        // $total = $postModel->pager->getTotal();

        // For a simple "all published posts" return (no pagination):
        $items = $builder->findAll();

        // Transform posts (only return fields client needs)
        $result = array_map(function($post) {
            return [
                'id'          => (int) $post['id'],
                'title'       => $post['title'],
                'slug'        => $post['slug'],
                'excerpt'     => $post['post_excerpt'] ?? null,
                'body'        => $post['body'] ?? null,
                'image_url'   => $post['image_url'] ?? null,
                'created_at'  => $post['created_at'] ?? null,
                'updated_at'  => $post['updated_at'] ?? null,
            ];
        }, $items);

        return $this->respond([
            'status' => 'success',
            'count'  => count($result),
            'data'   => $result
        ], 200);
    }

    /**
     * GET /api/posts/{id}
     * Optional: return one published post by id or slug
     */
    public function show($id = null)
    {
        // Try find by id first, then try slug if not numeric
        $post = null;
        if (is_numeric($id)) {
            $post = $this->model->find($id);
        } else {
            $post = $this->model->where('slug', $id)->first();
        }

        if (! $post || $post['status'] !== 'published') {
            return $this->failNotFound('Post not found or not published');
        }

        $data = [
            'id' => (int)$post['id'],
            'title' => $post['title'],
            'slug' => $post['slug'],
            'excerpt' => $post['post_excerpt'] ?? null,
            'body' => $post['body'],
            'image_url' => $post['image_url'] ?? null,
            'created_at' => $post['created_at'],
            'updated_at' => $post['updated_at'],
        ];

        return $this->respond(['status' => 'success', 'data' => $data], 200);
    }
}
