<?php

namespace models;

//using the database class namespace
use models\Model;

class User extends Model {

    public function getAllUsersByNameOrEmail($name, $email) {
        $query = "select * from posts WHERE CONCAT(firstName,' ',lastName) like :name or email like :email";
        return $this->query($query, [
            'name' => '%' . $name . '%',
            'email' => '%' . $email . '%',
        ]);
    }

    public function getAllUsers() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getUserById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveUser($inputData){
        $query = "insert into posts (firstName, lastName, email) values (:firstName, :lastName, :email);";
        return $this->query($query, $inputData);
    }

    public function updateUser($inputData){
        $query = "update posts set firstName = :firstName, lastName = :lastName, email = :email where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteUser($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}