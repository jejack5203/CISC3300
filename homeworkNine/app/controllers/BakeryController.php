<?php

namespace app\controllers;

use app\models\Bakery;

class BakeryController
{
    public function getBakery() {
        $bakeryModel = new Bakery();
        $query = !empty($_GET['itemName']) ? $_GET['itemName'] : null;
        //pinecone
        //nathan
        $bakery = $bakeryModel->getBakery($query);
        echo json_encode($bakery);
        exit();
    }

    public function getBakeryByID($id) {
        $bakeryModel = new Bakery();
        $bakery = $bakeryModel->getBakeryById($id);
        echo json_encode($bakery);
        exit();
    }

    public function bakeryView() {
        include './public/html/bakery.html';
        exit();
    }

    public function bakeryDetailsView() {
        include './public/html/bakeryDetails.html';
        exit();
    }

}