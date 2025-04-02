<?php
require_once "./app/models/Model.php";
require_once "./app/models/Bakery.php";
require_once "./app/controllers/BakeryController.php";

//set our env variables, remember con
$env = parse_ini_file('./.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\BakeryController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = api
//2 = users
//3 = id


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $bakeryController = new BakeryController();

    if ($id) {
        $bakeryController->getBakeryByID($id);
    } else {
        $bakeryController->getBakery();
    }
}


//views

if ($uriArray[1] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $bakeryController = new BakeryController();

    if ($id) {
        $bakeryController->bakeryDetailsView();
    } else {
        $bakeryController->bakeryView();
    }

}

//include '../public/assets/views/notFound.html';
exit();

?>