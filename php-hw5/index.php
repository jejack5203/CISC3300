<?php
//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);
//0
//1 forms

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = [
    [   
        "name" => "Ice Cream Cake", "price" => 19.99
    ],

    [
        "name" => "Brownie", "price" => 2.99
    ],
    [
        "name" => "Cakepop", "price" => 4.99
    ],
    [
        "name" => "Cookie", "price" => 2.99
    ]
];

echo json_encode($products);
    exit();
}

?>