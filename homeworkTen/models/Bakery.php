<?php

namespace models;

//using the database class namespace
use models\Model;

class Bakery extends Model {

    public function getAllBakerysByItemOrPrice($item, $price) {
        $query = "select * from bakery WHERE CONCAT(item,' ',price) like :item or price like :price";
        return $this->query($query, [
            'item' => '%' . $item . '%',
            'price' => '%' . $price . '%',
        ]);
    }

    public function getAllBakery() {
        $query = "select * from bakery";
        return $this->query($query);
    }

    public function getBakeryById($id){
        $query = "select * from bakery where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveBakery($inputData){
        $query = "insert into bakery (item, price) values (:item, :price);";
        return $this->query($query, $inputData);
    }

    public function updateBakery($inputData){
        $query = "update bakery set item = :item, price = :price where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteBakery($inputData){
        $query = "DELETE FROM bakery where id = :id";
        return $this->query($query, $inputData);
    }
}