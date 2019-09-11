<?php

return [
    
    PDO::class => function() {
    
        $dbParams = include '../config/dbParams.php';
            
        try {
            
            $pdo = new PDO("{$dbParams['driver']}:host={$dbParams['host']};dbname={$dbParams['dbname']}", $dbParams['user'], $dbParams['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            exit('Connection Error: '.$e->getMessage());
        }
        
        return $pdo;
        
    },
    
    Aura\SqlQuery\QueryFactory::class => function() {
        return new Aura\SqlQuery\QueryFactory('mysql');
    },
    
    League\Plates\Engine::class => function() {
        return new League\Plates\Engine('../app/views');
    },
    
    Delight\Auth\Auth::class=>function($container){
        return new Delight\Auth\Auth($container->get('PDO'));
    }
    
];