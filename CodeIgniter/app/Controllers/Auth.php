<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $this->load->helper('url');
        return view('auth/login');
    }
}
