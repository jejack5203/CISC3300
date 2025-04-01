<?php
require_once "../app/model/Model.php";
require_once "../app/model/Posts.php";
require_once "../app/controller/PostsController.php";

//set our env variables, remember con
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\PostsController;

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
        $postsController->getPosts();
    }
}


//views
/*
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $userController = new UserController();

    if ($id) {
        $userController->userDetailsView();
    } else {
        $userController->usersView();
    }

}
*/
//include '../public/assets/views/notFound.html';
exit();

?>