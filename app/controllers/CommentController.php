<?php

namespace app\controllers;

use app\models\Comment;
use League\Plates\Engine;
use Delight\Auth\Auth;

class CommentController
{
    
    private $comment;
    private $auth;

    public function __construct(Comment $comment, Engine $template, Auth $auth)
    {
        $this->auth = $auth;
        $this->comment = $comment;
        $this->template = $template;
    }
    
    public function leaveComment()
    {
        
        $data['author_id'] = $this->auth->getUserId();
        $data['text'] = htmlspecialchars(trim($_POST['text']));
        $data['post_id'] = htmlspecialchars(trim($_POST['post_id']));
        
        if ($this->comment->insert('comment', $data)) {
            flash()->success('Comment successfully added');
            header("Location: /post/{$data['post_id']}");
        } else {
            flash()->error('error adding comment');
            header("Location: /post/{$data['post_id']}");
        }
        
    }
    
}