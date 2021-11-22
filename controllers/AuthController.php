<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\Core\Application;

class AuthController extends Controller
{

    /**
     * show register form
     * @return view
     */
    public function register()
    {
        return $this->view('register');
    }
    
    /**
     * show login form
     * @return view
     */
    public function login()
    {
        return $this->view('login');
    }

}
