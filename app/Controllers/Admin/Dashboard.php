<?php

namespace App\Controllers\Admin;

use App\Models\PostModel;

class Dashboard extends AdminBaseController
{
    public function index()
    {
        $postModel = new PostModel();

        $totalPosts     = $postModel->countAll();
        $publishedPosts = $postModel->where('status', 'published')->countAllResults();
        $draftPosts     = $postModel->where('status', 'draft')->countAllResults();

        // Fetch latest 5 posts
        $latestPosts = $postModel->orderBy('created_at', 'DESC')->findAll(5);

        $data = [
            'title' => 'Admin Dashboard',
            'totalPosts' => $totalPosts,
            'publishedPosts' => $publishedPosts,
            'draftPosts' => $draftPosts,
            'latestPosts' => $latestPosts, // pass to view
        ];

        return view('admin/dashboard', $data);
    }

}
