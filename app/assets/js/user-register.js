$(document).ready(function(){
    var base_url = "http://localhost/benurse/";

    $('#username').on('focus', function(){
        $('#username').removeClass('input-error').addClass('input-default');
        $('.error-msg.nome').text('');
    });

    $('#email').on('focus', function(){
        $('#email').removeClass('input-error').addClass('input-default');
        $('.error-msg.email').text('');
    });

    $('#senha').on('focus', function(){
        $('#senha').removeClass('input-error').addClass('input-default');
        $('.error-msg.senha').text('');
    });
    
    $('#username').on('keyup', function(){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });

    $('#cadastro-user').on('submit', function(event){
        event.preventDefault();

        var nome = $('#username').val();
        var valida_nome = false;

        var email = $('#email').val();
        var valida_email = false;

        var senha = $('#senha').val();
        var valida_senha = false;

        if(nome.length < 5 || nome.indexOf(' ') === -1){
            $('#username').removeClass('input-default').addClass('input-error');
            $('.error-msg.nome').text('Insira um nome válido!');
        }else{
            $('#username').removeClass('input-error').addClass('input-default');
            $('.error-msg.nome').text('');
            valida_nome = true;
        }

        if(email.length < 5 || email.indexOf('@') === -1){
            $('#email').removeClass('input-default').addClass('input-error');
            $('.error-msg.email').text('Insira um email válido!');
        }else{
            $('#email').removeClass('input-error').addClass('input-default');
            $('.error-msg.email').text('');
            valida_email = true;
        }

        if(senha.length < 6){
            $('#senha').removeClass('input-default').addClass('input-error');
            $('.error-msg.senha').text('Insira uma senha 6 ou mais caracteres!');
        }else{
            $('#senha').removeClass('input-error').addClass('input-default');
            $('.error-msg.senha').text('');
            valida_senha = true;
        }

        if(valida_nome === true && valida_email === true && valida_senha === true){
            $.ajax({
                url: base_url+'ajax/register_user',
                method: 'POST',
                dataType: 'json',
                data: {nome: nome, email: email, senha: senha},
                success: function(json){
                    if(json.msg === 'email-exist'){
                        $('#email').removeClass('input-default').addClass('input-error');
                        $('.error-msg.email').text('Este e-mail já possui cadastro.');
                    }

                    if(json.msg === 'email-invalid'){
                        $('#email').removeClass('input-default').addClass('input-error');
                        $('.error-msg.email').text('Email inválido.');
                    }

                    if(json.msg === 'name-invalid'){
                        $('#username').removeClass('input-default').addClass('input-error');
                        $('.error-msg.nome').text('Nome inválido.');
                    }

                    if(json.msg === 'password-invalid'){
                        $('#senha').removeClass('input-default').addClass('input-error');
                        $('.error-msg.senha').text('Senha inválida.');
                    }

                    if(json.msg === 'done'){
                        window.location.href = base_url+'user/login';
                    }
                }
            });
        }
    });




});