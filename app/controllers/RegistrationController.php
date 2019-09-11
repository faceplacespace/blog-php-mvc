<?php

namespace app\controllers;

use League\Plates\Engine;
use Delight\Auth\Auth;
use app\models\User;

class RegistrationController
{

    private $qb;
    private $template;
    private $auth;
    private $user;

    public function __construct(Engine $template, Auth $auth, User $user)
    {
        $this->template = $template;
        $this->auth = $auth;
        $this->user = $user;
    }
    
    public function index()
    {
        
        if ($this->auth->isLoggedIn()) {
            header('Location: /');
        }
        
        echo $this->template->render('/registration-form');  
        
    }

    public function submit()
    {
        
        $userName = htmlspecialchars(trim($_POST['username']));
        $userEmail = htmlspecialchars(trim($_POST['email']));
        $userPassword = htmlspecialchars(trim($_POST['password']));
        
        $imageData = [];
        
        if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
            $imageData = $_FILES['image'];
        }
        
        $this->user->register($userName, $userEmail, $userPassword, $imageData);
        
    }
    
}   