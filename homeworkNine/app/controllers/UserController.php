<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    public function getUsers() {
        $userModel = new User();
        $query = !empty($_GET['itemName']) ? $_GET['itemName'] : null;
        //pinecone
        //nathan
        $users = $userModel->getUsers($query);
        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

    public function usersView() {
        include './public/html/users.html';
        exit();
    }

    public function userDetailsView() {
        include './public/html/userDetails.html';
        exit();
    }

}