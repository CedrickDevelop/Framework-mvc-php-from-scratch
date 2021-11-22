<?php

namespace App\controllers;

use App\core\Request;
use App\core\Controller;
use App\core\Application;
use App\model\RegisterModel;

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
    public function checkRegister(Request $request)
    {
        $registerModel = new RegisterModel();              

        if (isset($request)){

            $registerModel->loadData($request->getBody());
    
            if($registerModel->validate() && $registerModel->register()){
                return 'success';
            } 
            return $this->view('register', [
                'model' => $registerModel
            ]);
        }       

        // $body = $request->getBody();
        echo '<pre>';
        print_r($request);
        echo '</pre>';

        return $this->view('register', [
            'model' => $registerModel
        ]);
    }

}
