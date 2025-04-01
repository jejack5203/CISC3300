<?php

namespace controllers;

use models\Posts;

class PostsController
{
    public function validatePosts($inputData) {
        $errors = [];
        $title = $inputData['title'];
        $description = $inputData['description'];

        if ($title) {
            $title = htmlspecialchars($title, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($title) < 2) {
                $errors['titleShort'] = 'title is too short';
            }
        } else {
            $errors['requiredtitle'] = 'title is required';
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requireddescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'title' => $title,
            'description' => $description,
        ];
    }

    public function getAllPosts() {
        $postsModel = new Posts();
        header("Content-Type: application/json");
        $posts = $postsModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostsByID($id) {
        $postsModel = new Posts();
        header("Content-Type: application/json");
        $posts = $postsModel->getPostsById($id);
        echo json_encode($posts);
        exit();
    }

    public function savePosts() {
        $inputData = [
            'title' => $_POST['title'] ?: null,
            'description' => $_POST['description'] ?: null,
        ];
        $postsData = $this->validatePosts($inputData);

        $posts = new Posts();
        $posts->savePosts(
            [
                'title' => $postsData['title'],
                'description' => $postsData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePosts($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'title' => $_PUT['title'] ?: null,
            'description' => $_PUT['description'] ?: null,
        ];
        $postsData = $this->validatePosts($inputData);
        //we could save the data off to be saved here

        $posts = new Posts();
        $posts->updatePosts(
            [
                'id' => $id,
                'title' => $postsData['title'],
                'description' => $postsData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePosts($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $posts = new Posts();
        $posts->deletePosts(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function postsView() {
        include './public/views/posts/posts-view.html';
        exit();
    }

    public function postsAddView() {
        include './public/views/posts/posts-add.html';
        exit();
    }

    public function postsDeleteView() {
        include './public/views/posts/posts-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include './public/views/posts/posts-update.html';
        exit();
    }


}