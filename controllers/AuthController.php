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

        /**
     * Handle submitted login form
     */
    public static function checkLogin(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        print_r($body); 
        echo '</pre>';
    }
        /**
     * Handle submitted contact form
     */
    public static function checkRegister(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        print_r($body);
        echo '</pre>';
    }

}
