<?php
require_once "./models/Model.php";
require_once "./models/Posts.php";
require_once "./controllers/PostsController.php";

//set our env variables
$env = parse_ini_file('./.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
//define('DBPASS', $env['DBPASS']);

use controllers\PostsController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postsController = new PostsController();

    if ($id) {
        $postsController->getPostsByID($id);
    } else {
        $postsController->getAllPosts();
    }
}

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postsController = new PostsController();
    $postsController->savePosts();
}

//update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $postsController = new PostsController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postsController->updatePosts($id);
}

//delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $postsController = new PostsController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postsController->deletePosts($id);
}

//views


if ($uri === '/new-posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postsController = new PostsController();
    $postsController->postsAddView();
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postsController = new PostsController();
    $postsController->postsUpdateView();
}

if ($uriArray[1] === 'delete-posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postsController = new PostsController();
    $postsController->postsDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postsController = new PostsController();
    $postsController->postsView();
}

//include '../public/assets/views/notFound.html';
exit();

?>