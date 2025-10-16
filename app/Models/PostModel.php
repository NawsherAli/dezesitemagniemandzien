<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug','post_excerpt', 'body', 'image_url', 'status'];
    protected $useTimestamps = true;

    public function getPublished()
    {
        return $this->where('status', 'published')->orderBy('created_at', 'DESC')->findAll();
    }

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
