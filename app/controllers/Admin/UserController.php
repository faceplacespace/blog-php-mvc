<?php

namespace app\controllers\Admin;

use app\controllers\Admin\AdminController;
use app\models\User;
use Delight\Auth\Auth;
use League\Plates\Engine;

class UserController extends AdminController
{
    
    private $user;

    public function __construct(Auth $auth, Engine $template, User $user)
    {
        parent::__construct($auth, $template);
        $this->user = $user;
    }


    public function viewAllUsers()
    {
        $users = $this->user->getAll('users');
        echo $this->template->render('/admin/users/index', ['users' => $users]);
    }
    
    public function createUserForm()
    {
        echo $this->template->render('/admin/users/create');
    }

    public function createUser()
    {
        
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        
        try {
            
            $userId = $this->auth->admin()->createUser($email, $password, $username);

            flash()->success('User successfully created');
            header('Location: /admin/users');
            
        } catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            header('Location: /admin/users');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            header('Location: /admin/users');          
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('User already exists');
            header('Location: /admin/users');
        }
        
    }
    
    public function editUserForm($id)
    {
        $user = $this->user->getOne('users', $id);
        echo $this->template->render('/admin/users/edit', ['user' => $user]);
    }

    public function editUser($id)
    {
        $user = $_POST;
        
        if (empty($user['password'])) {
            $currentUser = $this->user->getOne('users', $id);
            $user['password'] = $currentUser['password'];
        }
        
        if (!isset($user['banned'])) {
            $user['banned'] = 0;
        }

        if ($this->user->update('users', $user, $id)) {
            flash()->success('User information successfully updated');
            header('Location: /admin/users');
        } else {
            flash()->error('Error updating user information');
            header('Location: /admin/users/edit'.$id);
        }
        
    }
    
    public function deleteUser($id)
    {
        
        try {
            
            $this->auth->admin()->deleteUserById($id);
            
            flash()->success('User successfully deleted');
            header('Location: /admin/users');
            
        } catch (\Delight\Auth\UnknownIdException $e) {
            flash()->error('Unknown id');
            header('Location: /admin/users'); 
        }
        
    }
    
}