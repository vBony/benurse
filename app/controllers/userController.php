<?php
class userController extends controllerHelper{
    public function register(){
        $data = array();
        $data['css'] = 'user-register.css';
        $data['js'] = 'user-register.js';

        $this->loadView('user-register', $data);
    }

    public function login(){
        if(isset($_SESSION['user-id']) && !empty($_SESSION['user-id'])){
            header('Location: '.BASE_URL.'user/feed');
        }else{
            $data = array();

            $this->loadView('user-login', $data);
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.BASE_URL);
    }

    public function first_access(){
        if(isset($_SESSION['user-id']) && !empty($_SESSION['user-id'])){
            $userObj = new User();
            $user_data = $userObj->getAllDataUser($_SESSION['user-id']);

            $first_name = explode(" " ,$user_data[0]['username']);
            $first_name = $first_name[0];

            $data = array();
            $data['user'] = $user_data;
            $data['first_name'] = $first_name;
            $data['cargos'] = $userObj->getAllCargos();

            $this->loadView('first-access', $data);
        }
    }

    public function feed(){
        if(isset($_SESSION['user-id']) && !empty($_SESSION['user-id'])){
            $userObj = new User();

            $data = array();
            $data['css'] = 'user-feed.css';
            $data['js'] = 'user-feed.js';
            

            $user_data = $userObj->getAllDataUser($_SESSION['user-id']);
            $data['user'] = $user_data;

            $first_name = explode(" " ,$user_data[0]['username']);
            $first_name = $first_name[0];
            $data['first_name'] = $first_name;

            if($user_data[0]['first_access'] == 1){

                header('Location: '.BASE_URL.'user/first_access');

            }else{

                $this->loadTemplateLogged('user-feed', $data);

            }
            
        }else{
            header('Location: '.BASE_URL);
        }
    }
}