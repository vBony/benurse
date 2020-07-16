<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>benurse: Plataforma para enfermeiros</title>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/template_logged.css">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/<?=$css?>">
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/template_logged.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <header id="header_inv">
        <div id="background_header">
            <div id="logo_area">
                <img src="<?=BASE_URL?>app/assets/images/logo_header.png" id="logo_header">
            </div>

            <div id="menu_area_desktop">
                    <div id="nav-area">
                    <a href="" class="nav_item_header"><strong>Portal</strong></a>
                    <a href="" class="nav_item_header blue"><strong>Procurar vagas</strong></a>
                    </div>

                    <div id="user-stats-header">
                        <img src="<?=BASE_URL.'app/assets/images/profile_photos/'.$user[0]['profile_photo']?>" id="img-ush">
                        <div id="name-ush"><?=$first_name?></div>
                        <i class="fas fa-angle-down" id="seta"></i>
                    </div>

                    <div id="drop-down-desktop">
                        <ul id="list-ddd">
                            <li id="editar-perfil-ddd" class="options-ddd">
                                <div class="text-ddd">Editar meu perfil</div>
                                <div class="icon-area-ddd"><i class="fas fa-user-edit"></i></div>
                            </li>

                            <li id="sair-ddd" class="options-ddd">
                                <div class="text-ddd">Sair</div>
                                <div class="icon-area-ddd"><i class="fas fa-sign-out-alt"></i></div>
                            </li>
                        </ul>
                    </div>
            </div>

            <div id="menu_area_mobile">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </header>

    <?php $this->loadViewInTemplate($viewName, $viewData)?>
</body>
</html>