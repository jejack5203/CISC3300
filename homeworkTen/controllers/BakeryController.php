<?php

namespace controllers;

use models\Bakery;

class BakeryController
{
    public function validateBakery($inputData) {
        $errors = [];
        $item = $inputData['item'];
        $price = $inputData['price'];

        if ($item) {
            $item = htmlspecialchars($item, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($item) < 2) {
                $errors['titleShort'] = 'item name is too short';
            }
        } else {
            $errors['requireditem'] = 'item is required';
        }

        if ($price) {
            $price = htmlspecialchars($price, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($price) < 1) {
                $errors['priceShort'] = 'price is too small';
            }
        } else {
            $errors['requiredprice'] = 'price is required';
        }
      
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'item' => $item,
            'price' => $price,
        ];
    }

    public function getAllBakery() {
        $bakeryModel = new Bakery();
        header("Content-Type: application/json");
        $bakery = $bakeryModel->getAllBakery();

        echo json_encode($bakery);
        exit();
    }

    public function getBakeryByID($id) {
        $bakeryModel = new Bakery();
        header("Content-Type: application/json");
        $bakery = $bakeryModel->getBakeryById($id);
        echo json_encode($bakery);
        exit();
    }

    public function saveBakery() {
        $inputData = [
            'item' => $_POST['item'] ?: null,
            'price' => $_POST['price'] ?: null,
        ];
        $bakeryData = $this->validateBakery($inputData);

        $bakery = new Bakery();
        $bakery->saveBakery(
            [
                'item' => $bakeryData['item'],
                'price' => $bakeryData['price'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateBakery($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'item' => $_PUT['item'] ?: null,
            'price' => $_PUT['price'] ?: null,
        ];
        $bakeryData = $this->validateBakery($inputData);
        //we could save the data off to be saved here

        $bakery = new Bakery();
        $bakery->updateBakery(
            [
                'id' => $id,
                'item' => $bakeryData['item'],
                'price' => $bakeryData['price'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteBakery($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $bakery = new Bakery();
        $bakery->deleteBakery(
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

    public function bakeryView() {
        include './public/views/bakery/bakery-view.html';
        exit();
    }

    public function bakeryAddView() {
        include './public/views/bakery/bakery-add.html';
        exit();
    }

    public function bakeryDeleteView() {
        include './public/views/bakery/bakery-delete.html';
        exit();
    }

    public function bakeryUpdateView() {
        include './public/views/bakery/bakery-update.html';
        exit();
    }
    

}