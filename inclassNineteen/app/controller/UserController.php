<?php

namespace app\controllers;

use app\model\User;

class UserController
{
    public function getUsers() {
        $userModel = new User();
        header("Content-Type: application/json");
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        $users = $userModel->getUsers($query);

        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        header("Content-Type: application/json");
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

   

}