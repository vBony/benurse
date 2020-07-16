<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login como candidato</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/user-login.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/user-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon">
</head>
<body>
    <div id="fixed-bg">
        <img src="<?=BASE_URL?>app/assets/images/logo_footer.png" alt="">
        <div id="title-area">Bem-vindo de volta!</div>
    </div>

    <div id="container">
        <div id="app-area">
            <form id="login-user" method="post">

                <div id="session_login">
                    <div class="label-default">Email</div>
                    <input type="text" class="input-default" id="email">
                    <div class="error-msg email"></div>

                    <div class="label-default">Senha</div>
                        <input type="password" name="senha" id="senha" class="input-default">
                    <div class="error-msg senha"></div>

                    <button type="submit" class="btn-continuar" id="btn-submit">Continuar</button>

                    <div id="register-area">Não tem uma conta? <a href="<?=BASE_URL?>/user/register">Crie uma!</a></div>

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
                </div>

                

            </form>
        </div>

        <a href="<?=BASE_URL?>/empresa/login" id="btn-sou_empresa">Sou empresa</a>
    </div>

</body>
</html>