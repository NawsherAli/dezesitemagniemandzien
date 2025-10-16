<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminBaseController extends BaseController
{
    protected $session;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = session();

        if (!$this->session->get('isLoggedIn')) {
            // Force redirect and stop execution
            redirect()->to(site_url('admin/login'))->send();
            exit;
        }
    }
}
