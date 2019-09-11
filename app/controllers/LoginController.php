<?php

namespace app\controllers;

use League\Plates\Engine;
use Delight\Auth\Auth;

class LoginController
{

    private $template;
    private $auth;

    public function __construct(Engine $template, Auth $auth)
    {
        $this->template = $template;
        $this->auth = $auth;
    }
    
    public function index()
    {
        
        if($this->auth->isLoggedIn()) {
            header('Location: /');
        }
        
        echo $this->template->render('/login-form'); 
        
    }

    public function login()
    {
        
        if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
            $rememberDuration = (int) (60 * 60 * 24 * 365.25);
        } else {
            $rememberDuration = null;
        }
        
        try {
            $this->auth->login($_POST['email'], $_POST['password'], $rememberDuration);
            header('Location: /');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Wrong email address');
            header('Location: /login');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Wrong password');
            header('Location: /login');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
            header('Location: /login');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            header('Location: /login');
        }
        
    }

    public function logout()
    {
        $this->auth->logOut();
        header('Location: /');
    }
    
}