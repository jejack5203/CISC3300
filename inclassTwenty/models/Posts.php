<?php

namespace models;

//using the database class namespace
use models\Model;

class Posts extends Model {

    public function getAllPostssByTitleOrDescription($title, $description) {
        $query = "select * from posts WHERE CONCAT(title,' ',description) like :title or description like :description";
        return $this->query($query, [
            'title' => '%' . $title . '%',
            'description' => '%' . $description . '%',
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostsById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePosts($inputData){
        $query = "insert into posts (title, description) values (:title, :description);";
        return $this->query($query, $inputData);
    }

    public function updatePosts($inputData){
        $query = "update posts set title = :title, description = :description where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePosts($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}