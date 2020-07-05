<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Olá <?=$user[0]['username']?></h1>  
    <a href="<?=BASE_URL?>/user/logout">Sair</a>
    <h4>ID: <?=$user[0]['id'];?></h4>
    <p>FBID: 
        <?php 
        if(!empty($user[0]['fb_id'])){
            echo $user[0]['fb_id'];
        }else{
            echo "Este usuário não vinculou sua conta com o facebook!";
        } ?></p>

        <?php var_dump($user); ?>
</body>
</html>