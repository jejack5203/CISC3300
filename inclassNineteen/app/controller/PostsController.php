<?php

namespace app\controllers;

use app\model\Posts;

class PostsController
{
    public function getPosts() {
        $postsModel = new Posts();
        header("Content-Type: application/json");
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        $posts = $postsModel->getPosts($query);

        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $postsModel = new User();
        header("Content-Type: application/json");
        $posts = $postsModel->getPostById($id);
        echo json_encode($posts);
        exit();
    }

   

}