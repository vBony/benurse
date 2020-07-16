<h1>Bem vindo <?=$user[0]['username']?></h1>
<ul>
    <li><img src="<?php echo BASE_URL.'app/assets/images/profile_photos/'.$user[0]['profile_photo']?>" width="100" alt=""></li>
    <li><strong>Membro desde: </strong><?=$user[0]['mermber_since']?></li>
    <br>
    <li><strong>Email: </strong><?=$user[0]['email']?></li>
    <li><strong>CPF: </strong><?=$user[0]['cpf']?></li>
    <li><strong>Telefone: </strong><?=$user[0]['telefone']?></li>
    <li><strong>CEP: </strong><?=$user[0]['cep']?></li>
    <li><strong>Endereço: </strong><?=$user[0]['bairro']?>, <?=$user[0]['cidade']?>-<?=$user[0]['estado']?></li>
    <li>
        <strong>Cargo: </strong>
        <?php
            switch($user[0]['cargo_id']){
                case 1:
                    echo "Enfermeiro";
                break;

                case 2:
                    echo "Auxiliar de Enfermagem";
                break;

                case 3:
                    echo "Técnico de Enfermagem";
                break;  
            }
        ?>
    </li>
    <br>
    <li>
        <strong>PCD: </strong>
        <?php 
            if($user[0]['pcd'] == 1){
                echo 'Sim';
            }else{
                echo "Não";
            }
        ?>
    </li>
</ul>
<br><br>
<a href="<?=BASE_URL?>/user/logout">Sair</a>