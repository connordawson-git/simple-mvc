<?php
class UserModel extends Model{
    public function register() {
        //Santizise Post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']); 

        if($post['submit']){

            //Insert into mysql
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();

            //Verify
            if($this->lastInsertId()){
                //Redirect
                header('Location:' .ROOT_URL.'users/login');
            }
        }
        return;
    }

    public function login(){
        //Santizise Post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']); 

        if($post['submit']){
            //Compare login
            $this->query('SELECT * FROM users Where email = :email && password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();

            $row = $this->single();
            if($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                );
                header('Location:' .ROOT_URL.'articles');
            } else {
                echo 'Incorrect Login';
            }
        }
        return;
    }
}