$( document ).ready(function(){

    var base_url = 'http://localhost/benurse/'


    $('#drop_down_cadastro').hide();
    $('#drop_down_login').hide();

    $('.registerBTN').on('click', function(){
        $('#drop_down_login').hide();
        $('#drop_down_cadastro').fadeToggle('fast');
    });

    $('#login_nav_bar').on('click', function(){
        $('#drop_down_cadastro').hide();
        $('#drop_down_login').fadeToggle('fast');
    });

    $('#login-candidato').on('click', function(){
        window.location.href = `${base_url}user/login`
    });

    $('#cadastro-candidato').on('click', function(){
        window.location.href = `${base_url}user/register`
    });

    $('#menu_area_mobile').on('click', function(){
        this.classList.toggle("change");
    });

    $('#menu_area_mobile').on('click', function(){
        $('#mobile_drop_down').slideToggle('fast');
    });

    $('#cadastro_row_mobile').on('click', function(){
        $('#login_candidato_mobile, #login_empresa_mobile').slideUp('fast');
        $('#cadastro_candidato_mobile, #cadastro_empresa_mobile').slideToggle('fast');
    });

    $('#login_row_mobile').on('click', function(){
        $('#cadastro_candidato_mobile, #cadastro_empresa_mobile').slideUp('fast');
        $('#login_candidato_mobile, #login_empresa_mobile').slideToggle('fast');
    });

    $('#cadastro_candidato_mobile').on('click', function(){
        window.location.href = `${base_url}user/register`
    });
    
});