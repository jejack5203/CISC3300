<?php
require_once "./models/Model.php";
require_once "./models/Bakery.php";
require_once "./controllers/BakeryController.php";

//set our env variables
$env = parse_ini_file('./.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
//define('DBPASS', $env['DBPASS']);

use controllers\BakeryController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $bakeryController = new BakeryController();

    if ($id) {
        $bakeryController->getBakeryByID($id);
    } else {
        $bakeryController->getAllBakery();
    }
}

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $bakeryController = new BakeryController();
    $bakeryController->saveBakery();
}

//update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $bakeryController = new BakeryController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $bakeryController->updateBakery($id);
}

//delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $bakeryController = new BakeryController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $bakeryController->deleteBakery($id);
}

//views


if ($uri === '/new-item' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $bakeryController = new BakeryController();
    $bakeryController->bakeryAddView();
}

if ($uriArray[1] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $bakeryController = new BakeryController();
    $bakeryController->bakeryUpdateView();
}

if ($uriArray[1] === 'delete-item' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $bakeryController = new BakeryController();
    $bakeryController->bakeryDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $bakeryController = new BakeryController();
    $bakeryController->bakeryView();
}

//include '../public/assets/views/notFound.html';
exit();

?>