<?php

namespace Controller;

use Models\PostModel;

class PostController
{
    public function getPost() {
        $userModel = new User();
        $users = $userModel->getArray($arg);
        echo json_encode($users);
      //  echo 'hi';
        exit();
    }

}