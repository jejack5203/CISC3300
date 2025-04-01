<?php

namespace app\models;

class User extends Model {

    public function getUsers($name) {
        if ($name) {
            $query = "select * from bakery WHERE itemName like :itemName";
            return $this->fetchAllWithParams($query, ['itemName' => '%' . $name . '%']);
        }
        $query = "select * from bakery";
        return $this->fetchAll($query);
    }

    public function getUserById($id){
        $query = "select * from bakery where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}