<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/template.css">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/<?=$css?>">
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/template.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
</head>
<body>
    <header id="header_inv">
        <div id="background_header">
            <div id="logo_area">
                <img src="<?=BASE_URL?>app/assets/images/logo_header.png" id="logo_header">
            </div>

            <div id="menu_area_desktop">
                    <a href="" class="nav_item_header"><strong>Portal</strong></a>
                    <a href="" class="nav_item_header blue"><strong>Ver vagas</strong></a>
                    <a href="" class="nav_item_header"><strong>Sou empresa</strong></a>
                    <span id="login_nav_bar">Login</span>
                    <div class="registerBTN"><strong> Cadastrar-se </strong></div>
            </div>

            <div id="menu_area_mobile">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </header>

    <div id="drop_down_cadastro" class="off">
        <div class="ddc_row">
            <img src="<?=BASE_URL?>app/assets/images/nurse.png" alt="">
            <div id="cadastro-candidato">Como candidato</div>
        </div>
        <div class="ddc_row">
            <img src="<?=BASE_URL?>app/assets/images/maleta.png" alt="">
            <div id="cadastro-empresa">Como empresa</div>
        </div>
    </div>

    <div id="drop_down_login" class="off">
        <div id="dot"></div>
        <div class="ddc_row">
            <img src="<?=BASE_URL?>app/assets/images/nurse.png" alt="">
            <div id="login-candidato">Como candidato</div>
        </div>
        <div class="ddc_row">
            <img src="<?=BASE_URL?>app/assets/images/maleta.png" alt="">
            <div id="login-empresa">Como empresa</div>
        </div>
    </div>

    <div id="mobile_drop_down">
        <div class="default-row" id="cadastro_row_mobile">Cadastre-se</div>
        <div class="default-row" id="cadastro_candidato_mobile">Como candidato</div>
        <div class="default-row" id="cadastro_empresa_mobile">Como empresa</div>
        <div class="default-row" id="login_row_mobile">Login</div>
        <div class="default-row" id="login_candidato_mobile">Como candidato</div>
        <div class="default-row" id="login_empresa_mobile">Como empresa</div>
        <div class="default-row" id="vervagas_mobile">Ver vagas</div>
        <div class="default-row" id="portal_mobile">Portal</div>
    </div>

    <?php $this->loadViewInTemplate($viewName, $viewData)?>

    <footer id="footer_bg">
        <div id="footer_inv">
            <div id="col-1_footer" class="col_footer">
                <p class="title_col">Candidatos</p>
                <a class="row_col_footer">Ajuda</a>
                <a class="row_col_footer">Plano PREMIUM</a>
                <a class="row_col_footer">Vagas para enfermeiro</a>
                <a class="row_col_footer">Vagas para técnico de enfermagem</a>
                <a class="row_col_footer">Vagas para auxiliar de enfermagem</a>
            </div>

            <div id="col-2_footer" class="col_footer">
                <p class="title_col">Institucional</p>
                <a class="row_col_footer">Quem somos?</a>
                <a class="row_col_footer">Perguntas frequentes</a>
                <a class="row_col_footer">Como adquirir créditos</a>
                <a class="row_col_footer">Contato</a>
                <a class="row_col_footer">Política de privacidade</a>
            </div>

            <div id="col-3_footer" class="col_footer">
                <p class="title_col">Empresas</p>
                <a class="row_col_footer">Ajuda</a>
                <a class="row_col_footer">Anunciar vagas</a>
                <a class="row_col_footer">Busque candidatos</a>
                <a class="row_col_footer"><i>SmartMatching</i></a>
            </div>
        </div>

        <div id="sub_footer">
            <div id="logo_footer"><img src="<?=BASE_URL?>assets/images/logo_footer.png" alt=""></div>
            <p>Sou enfermagem &copy; 2020 - Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>