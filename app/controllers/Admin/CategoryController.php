<?php

namespace app\controllers\Admin;

use app\controllers\Admin\AdminController;
use app\models\Category;
use Delight\Auth\Auth;
use League\Plates\Engine;

class CategoryController extends AdminController 
{
    
    private $category;

    public function __construct(Auth $auth, Engine $template, Category $category)
    {
        parent::__construct($auth, $template);
        $this->category = $category;
    }

    public function viewAllCategories()
    {
        $categories = $this->category->getAll('category');
        echo $this->template->render('/admin/categories/index', ['categories' => $categories]);
    }
    
    public function createCategoryForm()
    {
        echo $this->template->render('/admin/categories/create');
    }


    public function createCategory()
    {
        
        $category['title'] = htmlspecialchars(trim($_POST['title']));
        
        if($this->category->insert('category', $category)) {
            
            flash()->success('Category successfully added');
            header('Location: /admin/categories');
            
        } else {
            
            flash()->error('Error creating category');
            header('Location: /admin/categories/create');
            
        }
        
    }
    
    public function editCategoryForm($id)
    {
        
        $category = $this->category->getOne('category', $id);
        echo $this->template->render('/admin/categories/edit', ['category' => $category]);
        
    }

    public function editCategory($id)
    {
        
        $category['title'] = htmlspecialchars(trim($_POST['title']));

        if($this->category->update('category', $category, $id)) {
            
            flash()->success('Category name successfully changed');
            header('Location: /admin/categories');
            
        } else {
            
            flash()->error('Error updating category information');
            header('Location: /admin/categories/edit'.$id);
            
        }
        
    }
    
    public function deleteCategory($id)
    {
        
        if($this->category->delete('category', $id)) {
            
            flash()->success('Category deleted successfully');
            header('Location: /admin/categories');
            
        } else {
            
            flash()->error('Error deleting category');
            header('Location: /admin/categories/edit'.$id);
            
        }
        
    }
    
}