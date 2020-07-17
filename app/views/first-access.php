<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>benurse | Informações pessoais</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/user-data-form-register.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/first-access.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon">
    <script src="<?=BASE_URL?>/app/assets/js/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <div id="fixed-bg">
        <img src="<?=BASE_URL?>app/assets/images/logo_footer.png" alt="">
        <div id="title-area">Quase tudo pronto <?=$first_name;?>, agora só precisamos de algumas informações!</div>
    </div>

    <div id="container">
        <div id="app-area">
            <form method="post" id="session-personal-data">
                <div class="title-session">Dados pessoais</div>

                <div class="input-group">
                    <div class="label-default">Selecione uma foto de perfil</div>
                    <input type="file" id="image" name="image">
                    <div id="preview-area">
                        <i class="fas fa-camera"></i>
                        <img src="" id="uploaded-img">
                    </div>
                    <div class="error-msg image"></div>

                </div>

                <div class="input-group">
                    <div class="label-default">Idade</div>
                    <input type="text" id="idade" class='input-default' placeholder='Ex: 20'>
                    <div class="error-msg idade"></div>
                </div>

                <div class="input-group">
                    <div class="label-default">CPF</div>
                    <input type="text" id="cpf" class='input-default' placeholder='000.000.000-00'>
                    <div class="error-msg cpf"></div>
                </div>

                <div class="input-group">
                    <div class="label-default">Telefone</div>
                    <input type="text" id="tel" class='input-default' placeholder='00 00000-0000'>
                    <div class="error-msg telefone"></div>
                </div>

                <div class="input-group">
                    <div class="label-default">CEP</div>
                    <input type="text" id="cep" class='input-default' placeholder='00000-000'>
                    <div class="error-msg cep"></div>
                </div>

                <div id="show-data-cep">
                    <div class="input-group cidade_estado">
                        <input type="text" id="cidade" disabled class='input-default'>
                        <input type="text" id="estado" disabled class='input-default'>
                    </div>

                    <div class="input-group">
                        <input type="text" id="bairro" disabled class='input-default'>
                    </div>
                </div>

                <div class="input-group">
                    <div class="label-default">Cargo desejado</div>
                    
                    <select  id="cargo-desejado-select" class="input-default">    
                        <option value="0">Nenhum</option>
                        <?php foreach($cargos as $cargo) { ?>
                            <option value="<?=$cargo['cargo_id']?>"><?=$cargo['cargo_name']?></option>
                        <?php } ?>
                    </select>

                    <div class="error-msg cargo"></div>
                </div>

                <div class="input-group">
                    <div class="label-default">PcD?</div>
                    <select id="pcd-select" class="input-default">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>


                <input type="submit" value="Enviar e continuar" class="btn-continuar">
                
            </form>
            
            <form method="post" id="session-experiences">
                <div class="title-session">Experiências</div>
                <div class="input-group no-exp">
                    <input type="checkbox">
                    <span>Não tenho experiência profissional</span>
                </div>


                <input type="submit" value="Enviar e terminar" class="btn-continuar">
                
            </form>

        </div>
    </div>

</body>
</html>