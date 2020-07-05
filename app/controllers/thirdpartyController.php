<?php
class thirdpartyController extends controllerHelper{
    public function facebook(){
        require $_SERVER['DOCUMENT_ROOT'].'/benurse/app/assets/libraries/Facebook/autoload.php';
        $DBuser = new User();

        $fb = new Facebook\Facebook([
            'app_id' => '1338180326572722',
            'app_secret' => 'e8d644fb5ee41e92198aeeba124d6535',
            'default_graph_version' => 'v3.2',
        ]);

        $redirect = BASE_URL.'thirdparty/facebook';

        $helper = $fb->getRedirectLoginHelper();

        try {

            $accessToken = $helper->getAccessToken();
        
        
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
        
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        
        }

        if(! isset($accessToken)){
            $permissions = ['email'];
            $loginUrl = $helper->getLoginUrl($redirect, $permissions);

            header('Location: '.$loginUrl);
        }else{
            $fb->setDefaultAccessToken($accessToken);
            $responseUser = $fb->get('/me?fields=email,name,picture,id,link', $accessToken);
            $responseImage = $fb->get('/me/picture?redirect=false&width=250&height=250', $accessToken);
        
            //Dados do usuario pelo FB
            $FBuser = $responseUser->getGraphUser();
        
            //Foto de perfil
            $FBuserImage = $responseImage->getGraphUser();
        }

        $FBid = $FBuser->getId();
        $_SESSION['fb-id'] = $FBid;
        $FBemail = $FBuser['email'];
        $FBname = $FBuser['name'];

        if($DBuser->facebookLogin($FBid, $FBemail, $FBname)){
            header('Location: '.BASE_URL.'user/feed');
        }

        // //Listagem de dados
        // echo "<strong>Access Token:  </strong>".$accessToken.'<br>';
        // echo 'ID: '.$FBuser->getId().'<br>';
        // echo '<strong>Nome:</strong> '.$FBuser['name']."<br>";
        // echo '<strong>Email: </strong>'.$FBuser['email']."<br>";
        // echo '<strong>Foto de perfil: '.'<br>';
        // echo '<img src="'.$FBuserImage['url'].'"/><br><br>';
        // echo $_GET['code'];
    }
}

?>