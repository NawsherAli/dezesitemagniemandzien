<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        
        helper(['form']);
        $session = session();

        if ($this->request->getMethod() === 'POST') {
             
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                $session->set('isLoggedIn', true);
                $session->set('user', [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'name' => $user['name'],
                    'isLoggedIn'  => true,
                ]);
                return redirect()->to('admin/dashboard');
            } else {
                return view('admin/login', ['error' => 'Invalid username or password']);
            }
        }
     
        return view('admin/login');
    }

    public function logout()
    {
        $session = session();

        // Only destroy session if user is logged in
        if ($session->get('isLoggedIn')) {
                        // dd($session->get('isLoggedIn'));

            $session->destroy();
        }

        return redirect()->to('admin/login'); // no leading slash needed
    }

}
