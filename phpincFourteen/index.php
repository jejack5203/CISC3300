<?php
require "./Controllers/Controller.php";
require "./Models/Model.php";
require "./Routing/Router.php";


$router = new Router();
$router->handleRoutes();