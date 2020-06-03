<!-- <div id="bg_content">
    <div id="title_bg">Cadastre-se como candidato</div>
    <div id="principal_content_area">
        <div id="col-1">
            <div id="sub-title_bg">Olá, Enfermeiro(a)!</div>
            <div id="txt">
            Estamos aqui para te ajudar. Por isso precisamos de algumas 
            informações pessoais e profissionais para te auxiliar
            na sua busca pelo emprego. E evite erros ortográficos e seja sincero, 
            assim aumentando suas chances de contratação
            </div>
        </div>

        <div id="col-2">
        </div>
    </div>
</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/user-register.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/user-register.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div id="fixed-bg">
        <img src="<?=BASE_URL?>app/assets/images/logo_footer.png" alt="">
        <div id="title-area">Olá! Antes de tudo,<br> você precisa criar uma conta</div>
    </div>

    <div id="container">
        <div id="app-area">
            <form id="cadastro-user" method="post">

            <div id="session_nome" class='s1'>
                <div class="label-default">Qual o seu nome completo?</div>
                <input type="text" name="nome" class="input-default" id="username">

                <div class="label-default">Seu melhor email</div>
                <input type="text" name="email" class="input-default">

                <div class="label-default" id="senha">Uma senha exclusiva (min. 6 carácteres)</div>
                <input type="password" name="senha" id="senha" class="input-default">

                <div class="label-default" id="senha">Repita a senha</div>
                <input type="password" name="valida-senha" id="valida-senha" class="input-default">

                <div id="divisor-area">
                    <div id="lines"></div>
                    <div id="txt-divisor">ou</div>
                    <div id="lines"></div>
                </div>

                <a href="<?=BASE_URL?>thirdparty/facebook" id="link-fblogin">
                    <div id="FBLoginBtn">
                        <img src="<?=BASE_URL?>app/assets/images/facebook_white.png" alt="">
                        <div id="FBLBText">Continuar com o Facebook</div>
                    </div>
                </a>

                <div class="btn-continuar" id="s1_to_s2">Continuar</div>
            </div>

            </form>
        </div>

        <a href="" id="btn-sou_empresa">Sou empresa</a>
    </div>

</body>
</html>