<?php
class ajaxController extends controllerHelper{
    
    public function register_user(){
        $ajax_response = array();
        $userObj = new User();

        $nome = '';
        $email = '';
        $senha = '';

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
            $email = strip_tags($_POST['email']);
        }else{
            $ajax_response['msg'] = 'email-invalid';
            echo json_encode($ajax_response);
        }

        if(is_string($nome) == true){
            $nome = strip_tags($_POST['nome']);
        }else{
            $ajax_response['msg'] = 'name-invalid';
            echo json_encode($ajax_response);
        }

        if(is_string($senha) == true){
            $senha = strip_tags($_POST['senha']);
            $senha = password_hash($senha, PASSWORD_DEFAULT);
        }else{
            $ajax_response['msg'] = 'password-invalid';
            echo json_encode($ajax_response);
        }

        if($nome != '' && $email != '' && $senha != ''){
            if($userObj->basicRegisterUser($nome, $email, $senha) == false){
                $ajax_response['msg'] = 'email-exist';
                echo json_encode($ajax_response);
            }else{
                $ajax_response['msg'] = 'done';
                echo json_encode($ajax_response);
            }
        }
    }

    public function login_user(){
        $ajax_response = array();
        $userObj = new User();

        $email = '';
        $senha = '';

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
            $email = strip_tags($_POST['email']);
        }else{
            $ajax_response['msg'] = 'email-invalid';
            echo json_encode($ajax_response);
        }

        if(is_string($senha) == true){
            $senha = strip_tags($_POST['senha']);
        }else{
            $ajax_response['msg'] = 'password-invalid';
            echo json_encode($ajax_response);
        }

        if($email != '' && $senha != ''){
            if($userObj->loginUser($email, $senha) == 'email-notfound'){
                $ajax_response['msg'] = 'email-notfound';
                echo json_encode($ajax_response);
            }

            if($userObj->loginUser($email, $senha) == 'pass-wrong'){
                $ajax_response['msg'] = 'pass-wrong';
                echo json_encode($ajax_response);
            }

            if($userObj->loginUser($email, $senha) == 'done'){
                $ajax_response['msg'] = 'done';
                echo json_encode($ajax_response);
            }
        }
    }

    public function user_register_personal_data(){
        $userObj = new User();
        $ajax_response = array();

        $user_id = $_SESSION['user-id'];

        $foto = $_FILES['foto'];
        $cpf = strip_tags($_POST['cpf']);
        $idade = strip_tags($_POST['idade']);
        $telefone = strip_tags($_POST['telefone']);
        $cep = strip_tags($_POST['cep']);
        $cidade = strip_tags($_POST['cidade']);
        $estado = strip_tags($_POST['estado']);
        $bairro = strip_tags($_POST['bairro']);
        $cargo_id = strip_tags($_POST['cargo_id']);
        $pcd = strip_tags($_POST['pcd']);

        if($foto['type'] == 'image/png' || $foto['type'] == 'image/jpeg' && $foto['size'] <= 1000000){
            if($userObj->insertPersonalDataUser($user_id, $foto, $cpf, $idade, $telefone, $cep, $cidade, $estado, $bairro, $cargo_id, $pcd)){
                $ajax_response['msg'] = 'done';
                echo json_encode($ajax_response);
            }else{
                $ajax_response['msg'] = 'error';
                echo json_encode($ajax_response);
            }
        }else{
            $ajax_response['msg'] = 'error-photo';
            echo json_encode($ajax_response);
        }

        
    }
}