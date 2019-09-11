<?php

namespace app\models;

use Delight\Auth\Auth;
use PDO;
use Aura\SqlQuery\QueryFactory;
use components\exception\ImageUploadException;

class User extends BaseModel
{
    
    protected $auth;

    public function __construct(PDO $pdo, QueryFactory $queryFactory, Auth $auth)
    {
        parent::__construct($pdo, $queryFactory);
        $this->auth = $auth;
    }   

    public function register($userName, $email, $password, $imageData = null)
    {

        try {
            
            $userId = $this->auth->register($email, $password, $userName);

            if($imageData) {
                $imageUpload = new ImageUpload($imageData);
                $avatarPath = $imageUpload->uploadImage();
                $this->setAvatar($userId, $avatarPath);
            }
            
            flash()->success('You have successfully registered');
            header('Location: /login');
            
        } catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            header('Location: /registration');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            header('Location: /registration');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error($e->getMessage());
            header('Location: /registration');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            header('Location: /registration');
        } catch (ImageUploadException $e) {
            flash()->error($e->getMessage());
            header('Location: /registration');
        }
        
    }
    
    private function setAvatar($userId, $avatarPath)
    {
        
        $update = $this->queryFactory->newUpdate();
        
        $update
            ->table('users')
            ->cols(['avatar' => ':avatar'])
            ->where('id = :id')
            ->bindValue('id', $userId)
            ->bindValue('avatar', $avatarPath);
        
        $sth = $this->pdo->prepare($update->getStatement());
        
        return $sth->execute($update->getBindValues());
        
    }
    
}