<?php

namespace app\controllers\Admin;

use app\controllers\Admin\AdminController;
use app\models\Post;
use Delight\Auth\Auth;
use League\Plates\Engine;
use app\models\Category;
use app\models\ImageUpload;

class PostController extends AdminController
{
    
    private $post;
    private $category;

    public function __construct(Auth $auth, Engine $template, Post $post, Category $category)
    {
        
        parent::__construct($auth, $template);
        
        $this->post = $post;
        $this->category = $category;
        
    }

    public function viewAllPosts()
    {
        $posts = $this->post->getAllPosts();
        echo $this->template->render('/admin/photos/index', ['posts' => $posts]);
    }

    public function createPostForm()
    {
        $categories = $this->category->getAll('category');
        echo $this->template->render('/admin/photos/create', ['categories' => $categories]);
    }
    
    public function createPost()
    {
        
        $post['title'] = htmlspecialchars(trim($_POST['title']));
        $post['content'] = htmlspecialchars(trim($_POST['content']));
        $post['category_id'] = htmlspecialchars(trim($_POST['category_id']));
        $post['author_id'] = $this->auth->getUserId();
        
        if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
            $imageData = $_FILES['photo'];
            $imageUpload = new ImageUpload($imageData);
            $post['photo'] = $imageUpload->uploadImage();
        }

        if ($this->post->insert('post', $post)) {
            flash()->success('Post successfully added');
            header('Location: /admin');
        } else {
            flash()->error('Error creating post');
            header('Location: /admin/posts/create');
        }
        
    }
    
    public function editPostForm($id)
    {
        
        $categories = $this->category->getAll('category');
        
        $post = $this->post->getOne('post', $id);
        
        echo $this->template->render('/admin/photos/edit', ['post' => $post, 'categories' => $categories]);
        
    }

    public function editPost($id)
    {
        
        $post['title'] = htmlspecialchars(trim($_POST['title']));
        $post['content'] = htmlspecialchars(trim($_POST['content']));
        $post['category_id'] = htmlspecialchars(trim($_POST['category_id']));
        
        if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
            try{
                $imageData = $_FILES['photo'];
                $imageUpload = new ImageUpload($imageData);
                $post['photo'] = $imageUpload->uploadImage();
            } catch (\components\exception\ImageUploadException $e) {
                flash()->error($e->getMessage());
                header('Location: /admin/posts/edit/'.$id);
                die();
            }
        }

        if ($this->post->update('post', $post, $id)) {
            flash()->success('Post successfully updated');
            header('Location: /admin');
        } else {
            flash()->error('Error updating post');
            header('Location: /admin/posts/edit/'.$id);
        }
        
    }
    
    public function deletePost($id)
    {
        
        ImageUpload::removeImage($this->post->getImage($id));
        
        if ($this->post->delete('post', $id)) {
            flash()->success('Post successfully deleted');
            header('Location: /admin');
        } else {
            flash()->error('Error deleting post');
            header('Location: /admin/posts/'.$id);
        }
        
    }
    
}