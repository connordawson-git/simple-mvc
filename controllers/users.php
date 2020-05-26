<?php
class Users extends Controller {
    public function register(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }

    public function login(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }

    public function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        //Redirect
        header('Location: '. ROOT_URL);
    }
}