<?php
require_once "./controller/ErrorController.php";

use controller\ErrorController;

$errorController = new ErrorController();
$errorController->viewErrors();