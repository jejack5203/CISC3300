<?php
//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);
//0
//1 forms

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Form Submission Complete!'
    ]);
    exit();
}



?>


