<?php
require "./controller/noteController.php";

use controller\Note;

$controller = new Note();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->saveUser();
} else {
    require './view/messageVal.html';
}
?>