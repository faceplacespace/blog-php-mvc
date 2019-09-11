<?php

if (!session_id()) @session_start();

require_once '../vendor/autoload.php';

use DI\ContainerBuilder;

$builder = new ContainerBuilder;
$builder->addDefinitions('../config/definitions.php');
$container = $builder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    
    //blog routes
    $r->addRoute('GET', '/', ['app\controllers\PostController', 'viewAllPosts']);
    $r->addRoute('GET', '/post/{id:\d+}', ['app\controllers\PostController', 'viewPostDetail']);
    $r->addRoute('POST', '/comment/create', ['app\controllers\CommentController', 'leaveComment']);
    $r->addRoute('GET', '/registration', ['app\controllers\RegistrationController', 'index']);
    $r->addRoute('POST', '/registration/submit', ['app\controllers\RegistrationController', 'submit']);
    $r->addRoute('GET', '/login', ['app\controllers\LoginController', 'index']);
    $r->addRoute('POST', '/login/submit', ['app\controllers\LoginController', 'login']);
    $r->addRoute('GET', '/logout', ['app\controllers\LoginController', 'logout']);
    
    //admin routes
    $r->addRoute('GET', '/admin', ['app\controllers\admin\AdminController', 'index']);
    $r->addRoute('GET', '/admin/posts', ['app\controllers\admin\PostController', 'viewAllPosts']);
    $r->addRoute('GET', '/admin/posts/create', ['app\controllers\admin\PostController', 'createPostForm']);
    $r->addRoute('POST', '/admin/posts/add', ['app\controllers\admin\PostController', 'createPost']);
    $r->addRoute('GET', '/admin/posts/edit/{id:\d+}', ['app\controllers\admin\PostController', 'editPostForm']);
    $r->addRoute('POST', '/admin/posts/update/{id:\d+}', ['app\controllers\admin\PostController', 'editPost']);
    $r->addRoute('GET', '/admin/posts/delete/{id:\d+}', ['app\controllers\admin\PostController', 'deletePost']);
    $r->addRoute('GET', '/admin/users', ['app\controllers\admin\UserController', 'viewAllUsers']);
    $r->addRoute('GET', '/admin/users/create', ['app\controllers\admin\UserController', 'createUserForm']);
    $r->addRoute('POST', '/admin/users/add', ['app\controllers\admin\UserController', 'createUser']);
    $r->addRoute('GET', '/admin/users/edit/{id:\d+}', ['app\controllers\admin\UserController', 'editUserForm']);
    $r->addRoute('POST', '/admin/users/update/{id:\d+}', ['app\controllers\admin\UserController', 'editUser']);
    $r->addRoute('GET', '/admin/users/delete/{id:\d+}', ['app\controllers\admin\UserController', 'deleteUser']);
    $r->addRoute('GET', '/admin/categories', ['app\controllers\admin\CategoryController', 'viewAllCategories']);
    $r->addRoute('GET', '/admin/categories/create', ['app\controllers\admin\CategoryController', 'createCategoryForm']);
    $r->addRoute('POST', '/admin/categories/add', ['app\controllers\admin\CategoryController', 'createCategory']);
    $r->addRoute('GET', '/admin/categories/edit/{id:\d+}', ['app\controllers\admin\CategoryController', 'editCategoryForm']);
    $r->addRoute('POST', '/admin/categories/update/{id:\d+}', ['app\controllers\admin\CategoryController', 'editCategory']);
    $r->addRoute('GET', '/admin/categories/delete/{id:\d+}', ['app\controllers\admin\CategoryController', 'deleteCategory']);
    
    // not found route
    $r->addRoute('GET', '/404', ['app\controllers\NotFoundController', 'index']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        header('Location: /404');
        break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'Method not allowed.';
        break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        break;
    
}