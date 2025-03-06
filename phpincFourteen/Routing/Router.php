<?php

//require "../Controllers/Controller.php";

use Controllers\Controller;

class Router {

    public function handleRoutes() {

        //get URI without query string
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        //split url into array
        $uriArray = explode("/", $url);

        $this->userRoutes($uriArray);

    }



    protected function userRoutes($uriArray) {
        var_dump($uriArray);
        if ($uriArray[1] === '/post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new PostController();
            $userController->getArray();
        }
    }
}