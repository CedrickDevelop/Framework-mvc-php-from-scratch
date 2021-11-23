<?php

namespace App\controllers;

use App\core\Request;
use App\core\Controller;
use App\core\Application;
use App\model\RegisterModel;
use App\model\LoginModel;
use App\core\Form;

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
    public function checkLogin(Request $request)
    {
        $loginModel = new LoginModel();             
        

        if (isset($request)){

            $loginModel->loadData($request->getBody());

            $userFeedback = '';

                                
            if ($loginModel->verifyUserMail($loginModel->email)){
                // On le redirige vers la page de compte connecté
                header('LOCATION: ../views/welcome.php ');                
            } else {
                //if true user email exist already
                $userFeedback = "Votre email ou mot de passe ne correspondent pas ";
            }
            

            return $this->view('login', [
                'model' => $loginModel,
                'userExist' => $userFeedback
            ]);
        }       



        return $this->view('login', [
            'model' => $loginModel
            // 'form'  => $form
        ]);
    }

    /**
     * Handle submitted contact form
     */
    public function checkRegister(Request $request)
    {
        $registerModel = new RegisterModel();       
        // $form = new Form();     
        
        if (isset($request)){

            $registerModel->loadData($request->getBody());

            
    
            if($registerModel->validate() && $registerModel->register()){
                return 'success';
            } 

            return $this->view('register', [
                'model' => $registerModel
                // 'form'  => $form
            ]);
        }       

        return $this->view('register', [
            'model' => $registerModel
            // 'form'  => $form
        ]);
    }

}
