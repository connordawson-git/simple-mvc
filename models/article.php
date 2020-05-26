<?php

class ArticleModel extends Model{
    public function index() {
        $this->query('SELECT * FROM articles ORDER BY create_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add() {
        //Santizise Post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            //Insert into mysql
            $this->query('INSERT INTO articles (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', $post['1']);
            $this->execute();

            //Verify
            if($this->lastInsertId()){
                //Redirect
                header('Location:' .ROOT_URL.'articles');
            }
        }
        return;
    }
}