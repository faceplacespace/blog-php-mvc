<?php

namespace app\controllers;

use League\Plates\Engine;

class NotFoundController
{
    
    private $template;

    public function __construct(Engine $template)
    {
        $this->template = $template;
    }

    public function index()
    {
        echo $this->template->render('/404');    
    }
    
}