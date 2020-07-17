<?php
class User extends modelHelper{

    public function facebookLogin($FBid, $FBemail, $FBname){
        $sql = "SELECT * FROM users WHERE email = :email and fb_id = :fb_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $FBemail);
        $sql->bindValue(':fb_id', $FBid);
        $sql->execute();

        if($sql->rowCount() > 0){
            $this->createUserSessionWithID($FBemail);
        }else{
            // Criação do usuario pelo facebook
            unset($sql);
            $sql = "INSERT INTO users(id, fb_id, username, email, password, first_access, mermber_since)
                    VALUES (NULL, :fb_id, :username, :email, NULL, 1, :member_since)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':fb_id', $FBid);
            $sql->bindValue(':username', $FBname);
            $sql->bindValue(':email', $FBemail);
            $sql->bindValue(':member_since', date('d-m-Y'));
            $sql->execute();

            $this->createUserSessionWithID($FBemail);
        }

        return true;
    }

    
    public function basicRegisterUser($nome, $email, $senha){
        if($this->emailVerifier($email) == false){
            $sql = "INSERT INTO users(id, fb_id, username, email, password, first_access, mermber_since)
                    VALUES (NULL, NULL, :username, :email, :password, 1, :member_since)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':username', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $senha);
            $sql->bindValue(':member_since', date('d-m-Y'));
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }

    //Verifica se o email do usuário já existe
    private function emailVerifier($email){
        $sql = 'SELECT * FROM users WHERE email = :email';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    public function loginUser($email, $senha){
        if($this->emailVerifier($email) == true){
            $sql = 'SELECT * FROM users WHERE email = :email';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0){
                $user_data = $sql->fetch(PDO::FETCH_ASSOC);
                
                if(password_verify($senha, $user_data['password'])){
                    $this->createUserSessionWithID($email);
                    return 'done';
                }else{
                    return 'pass-wrong';
                }
            }else{
                return false;
            }
        }else{
            return 'email-notfound';
        }
    }

    private function createUserSessionWithID($email){
        $sql = 'SELECT * FROM users WHERE email = :email';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        foreach($sql as $id){
            $_SESSION['user-id'] = $id['id'];
        }
    }


    public function getAllDataUser($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $data_user = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $data_user;
    }

    public function getAllCargos(){
        $sql = "SELECT * FROM cargos";
        $sql = $this->db->query($sql);
        $sql->execute();

        $data_user = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $data_user;
    }

    public function insertPersonalDataUser($user_id, $foto, $cpf, $idade, $telefone, $cep, $cidade, $estado, $bairro, $cargo_id, $pcd){
        $this->insertProfilePhoto($foto);

        $sql = "UPDATE users SET
        cpf= :cpf,
        idade= :idade,
        telefone= :telefone,
        cep= :cep,
        cidade= :cidade,
        estado= :estado,
        bairro= :bairro,
        cargo_id= :cargo_id,
        pcd= :pcd
        WHERE id= :id";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':idade', $idade);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':estado', $estado);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cargo_id', $cargo_id);
        $sql->bindValue(':pcd', $pcd);
        $sql->bindValue(':id', $user_id);
        $sql->execute();

        return true;
    }

    public function insertProfilePhoto($foto){
        $nome_arquivo = '';

        if($foto['type'] == 'image/jpeg'){
            move_uploaded_file($foto['tmp_name'], 'app/assets/images/profile_photos/'.md5($_SESSION['user-id']).'.jpg');
            $nome_arquivo = md5($_SESSION['user-id']).'.jpg';
        }elseif($foto['type'] == 'image/png'){
            move_uploaded_file($foto['tmp_name'], 'app/assets/images/profile_photos/'.md5($_SESSION['user-id']).'.png');
            $nome_arquivo = md5($_SESSION['user-id']).'.png';
        }

        $sql = 'UPDATE users SET profile_photo= :foto WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':foto', $nome_arquivo);
        $sql->bindValue(':id', $_SESSION['user-id']);
        $sql->execute();
    }
}


?>