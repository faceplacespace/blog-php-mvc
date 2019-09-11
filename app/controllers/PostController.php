<?php

namespace app\controllers;

use app\models\Post;
use League\Plates\Engine;
use JasonGrimes\Paginator;
use app\models\Comment;

class PostController
{

    private $post;
    private $template;

    public function __construct(Post $post, Engine $template)
    {
        $this->post = $post;
        $this->template = $template;
    }
    
    public function viewAllPosts()
    {

        $currentPage = $_GET['page'] ?? 1;
        $uriPattern = '?page=(:num)';
        $totalItems = $this->post->getPostsCount();
        
        $posts = $this->post->getPostsByPage($currentPage);
        
        $latestPosts = $this->post->getLatest(4);
        $popularPosts = $this->post->getPopular(3);
        
        $paginator = new Paginator($totalItems, Post::ITEMS_PER_PAGE, $currentPage, $uriPattern);
        
        $this->template->registerFunction('substr', function ($string) {
            return substr($string, 0, 1000);
        });
        
        echo $this->template->render('/front/index', ['posts' => $posts, 'latestPosts' => $latestPosts, 'popularPosts' => $popularPosts, 'paginator' => $paginator]);
        
    }
    
    public function viewPostDetail($id, Comment $comments)
    {
        
        $comments = $comments->getAll($id);
        
        $prevPost = $this->post->getPrev($id);
        $nextPost = $this->post->getNext($id);
        
        $latestPosts = $this->post->getLatest(4);
        $popularPosts = $this->post->getPopular(3);
        
        $post = $this->post->getOnePost($id);
        
        echo $this->template->render('/front/post-detail', ['post' => $post, 'prevPost' => $prevPost, 'nextPost' => $nextPost, 'latestPosts' => $latestPosts, 'popularPosts' => $popularPosts, 'comments' => $comments]);
        
    }
    
}