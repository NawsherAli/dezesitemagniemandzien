<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseController;
use App\Models\PostModel;

class Posts extends AdminBaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        helper('text');
        $data['posts'] = $this->postModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/posts/index', $data);
    }

    public function create()
    {
        return view('admin/posts/create');
    }

    public function store()
    {
       
        $data = [
            'title' => $this->request->getPost('title'),
            'slug'  => url_title($this->request->getPost('title'), '-', true),
            'post_excerpt' => $this->request->getPost('post_excerpt'),
            'body'  => $this->request->getPost('body'),
            'image_url' => $this->request->getPost('image_url'),
            'status' => $this->request->getPost('status'),
        ];
  
        try {
            $this->postModel->insert($data);
            return redirect()->to('/admin/posts')->with('success', 'Post added successfully.');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->back()->withInput()->with('error', 'Slug already exists! Please use a different title.');
        }
    }

    public function edit($id)
    {
        $data['post'] = $this->postModel->find($id);
        return view('admin/posts/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'slug'  => url_title($this->request->getPost('title'), '-', true),
            'post_excerpt' => $this->request->getPost('post_excerpt'),
            'body'  => $this->request->getPost('body'),
            'image_url' => $this->request->getPost('image_url'),
            'status' => $this->request->getPost('status'),
        ];

        $this->postModel->update($id, $data);
        return redirect()->to('/admin/posts')->with('success', 'Post updated successfully.');
    }

    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/admin/posts')->with('success', 'Post deleted successfully.');
    }

    public function uploadImage()
    {
        $file = $this->request->getFile('upload');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
            $url = base_url('uploads/' . $newName);
            return $this->response->setJSON([
                "uploaded" => true,
                "url" => $url
            ]);
        }
        return $this->response->setJSON([
            "uploaded" => false,
            "error" => ["message" => "Upload failed."]
        ]);
    }

}
