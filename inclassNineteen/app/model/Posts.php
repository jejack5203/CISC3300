<?php

namespace app\model;

class Posts extends Model {

    public function getPosts($title) {
        if ($title) {
            $query = "select * from posts WHERE title like :title";
            return $this->fetchAllWithParams($query, ['title' => '%' . $title . '%']);
        }
        $query = "select * from posts";
        return $this->fetchAll($query);
    }

    public function getPostsById($id){
        $query = "select * from posts where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}
