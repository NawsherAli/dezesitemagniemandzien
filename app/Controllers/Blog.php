<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class Blog extends Controller
{
    public function index()
    {
        helper('text');
        $postModel = new PostModel();
        $data['posts'] = $postModel->getPublished();
        return view('blog/index', $data);
    }

    public function view($slug)
    {
        helper('text');
        $postModel = new PostModel();

        // Get the main post
        $post = $postModel->getBySlug($slug);

        if (!$post || $post['status'] !== 'published') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Post not found');
        }

        // Get other published posts excluding the current one
        $otherPosts = $postModel
            ->where('status', 'published')
            ->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll(3); // You can change '3' to show more posts

        // Pass both to the view
        return view('blog/view', [
            'post' => $post,
            'posts' => $otherPosts
        ]);
    }

}
