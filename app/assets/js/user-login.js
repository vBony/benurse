$(document).ready(function(){
    var base_url = "http://localhost/benurse/";

    $('#email').on('focus', function(){
        $('#email').removeClass('input-error').addClass('input-default');
        $('.error-msg.email').text('');
    });

    $('#senha').on('focus', function(){
        $('#senha').removeClass('input-error').addClass('input-default');
        $('.error-msg.senha').text('');
    });

    $('#login-user').on('submit', function(event){
        event.preventDefault();

        var email = $('#email').val();
        var valida_email = false;

        var senha = $('#senha').val();
        var valida_senha = false;

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
            $('.error-msg.senha').text('Insira uma senha válida!');
        }else{
            $('#senha').removeClass('input-error').addClass('input-default');
            $('.error-msg.senha').text('');
            valida_senha = true;
        }

        if(valida_email === true && valida_senha === true){
            $.ajax({
                url: base_url+'ajax/login_user',
                method: 'POST',
                dataType: 'json',
                data: {email: email, senha: senha},
                success: function(json){
                    if(json.msg === 'email-notfound'){
                        $('#email').removeClass('input-default').addClass('input-error');
                        $('.error-msg.email').text('E-mail não encontrado.');
                    }

                    if(json.msg === 'pass-wrong'){
                        $('#senha').removeClass('input-default').addClass('input-error');
                        $('.error-msg.senha').text('Senha incorreta.');
                    }   

                    if(json.msg === 'done'){
                        window.location.href =base_url+'user/feed';
                    }
                }
            });
        }
    });

    
})