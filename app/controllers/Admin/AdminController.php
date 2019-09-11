<?php

namespace app\controllers\Admin;

use Delight\Auth\Auth;
use League\Plates\Engine;

class AdminController
{
    
    public $auth;
    protected $template;

    public function __construct(Auth $auth, Engine $template)
    {
        
        $this->auth = $auth;
        $this->template = $template;
        
        if (!$auth->hasRole(\Delight\Auth\Role::ADMIN)) {
            header('Location: /404');
        }
        
    }
    
    public function index()
    {
        echo $this->template->render('/admin/index');
    }
    
}