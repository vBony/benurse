$(document).ready(function(){
    var base_url = 'http://localhost/benurse/';

    $('#preview-area').click(function(){
        $('#image').trigger('click');
    });

    $('#cpf').mask('000.000.000-00');
    $('#tel').mask('00 00000-0000');
    $('#cep').mask('00000-000');
    $('#idade').mask('00');

    $('#idade').on('keyup', function(){
        var idade = $(this).val().replace(/\D/g, '');
    });

    $('#cep').on('focus', function(){
        $(this).removeClass('input-error').addClass('input-default');
        $('.error-msg.cep').text('');
    })

    $('#idade').on('focus', function(){
        $(this).removeClass('input-error').addClass('input-default');
        $('.error-msg.idade').text('');
    });

    $('#cpf').on('focus', function(){
        $(this).removeClass('input-error').addClass('input-default');
        $('.error-msg.cpf').text('');
    })

    $('#tel').on('focus', function(){
        $(this).removeClass('input-error').addClass('input-default');
        $('.error-msg.telefone').text('');
    })

    $('#cargo-desejado-select').on('change', function(){
        $(this).removeClass('input-error').addClass('input-default');
        $('.error-msg.cargo').text('');
    })

    $('#image').on('change', function(event){
        $('.error-msg.image').text('');
        $('#preview-area').removeClass('preview-error');

        var reader = new FileReader();

        reader.onload = function(){
            $('.fas.fa-camera').hide();
            $('#uploaded-img').attr('src', reader.result);
        };  
        
        reader.readAsDataURL(event.target.files[0]);
    });

    var valida_cep_to_form = false;

    $('#cep').on('keyup', function(){
        var cep = $(this).val().replace(/\D/g, '');
        var validacep = /^[0-9]{8}$/;

        if(cep.length === 8 ){
            if(validacep.test(cep)) {

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        $('#show-data-cep').slideDown('fast');

                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                        valida_cep_to_form = true;
                    }
                    else {
                        $('#show-data-cep').slideUp('fast');
                        $('#cep').removeClass('input-default').addClass('input-error');
                        $('.error-msg.cep').text('CEP não encontrado');

                        valida_cep_to_form = false;
                    }
                });

            }else{

                $('#show-data-cep').slideUp('fast');
                $('#cep').removeClass('input-default').addClass('input-error');
                $('.error-msg.cep').text('CEP inválido');
                valida_cep_to_form = false;

            }
        }
    });

    $('#session-personal-data').on('submit', function(event){
        event.preventDefault();

        var foto = $('#image')[0].files;
        var validaIMG = false;

        var idade = $('#idade').val();
        var valida_idade = false;

        var cep = $('#cep').val();
        var cidade = $('#cidade').val();
        var estado = $('#estado').val();
        var bairro = $('#bairro').val();


        var cpf = $('#cpf').val();
        var validacpf = false;

        var tel = $('#tel').val();
        var validatel = false;

        var cargo_desejado = $('#cargo-desejado-select').val();
        var valida_cargo_desejado = false;
        
        var pcd = $('#pcd-select').val();

        if(idade < 17 || idade > 100){
            $('#idade').removeClass('input-default').addClass('input-error');
            $('.error-msg.idade').text('Idade inválida ou insuficiente');
        }else{
            $('#idade').removeClass('input-error');
            $('.error-msg.idade').text('');
            valida_idade = true;
        }

        if(foto.length === 0){
            $('#preview-area').addClass('preview-error');
            $('.error-msg.image').text('Selecione uma foto');
        }else{
            $('#preview-area').removeClass('preview-error');
            $('.error-msg.cep').text('');
            validaIMG = true;
        }

        if(cep.length < 8 || valida_cep_to_form === false){
            $('#cep').removeClass('input-default').addClass('input-error');
            $('.error-msg.cep').text('CEP inválido');
        }else{
            $('#cep').removeClass('input-error').addClass('input-default');
            $('.error-msg.cep').text('');
        }

        if(cpf.length < 14){
            $('#cpf').removeClass('input-default').addClass('input-error');
            $('.error-msg.cpf').text('CPF inválido ou incompleto');
        }else{
            $('#cpf').removeClass('input-error').addClass('input-default');
            $('.error-msg.cpf').text('');
            validacpf = true;
        }

        if(tel.length < 13){
            $('#tel').removeClass('input-default').addClass('input-error');
            $('.error-msg.telefone').text('Telefone inválido ou incompleto');
        }else{
            $('#tel').removeClass('input-error').addClass('input-default');
            $('.error-msg.telefone').text('')
            validatel = true;
        }

        if(cargo_desejado === '0'){
            $('#cargo-desejado-select').removeClass('input-default').addClass('input-error');
            $('.error-msg.cargo').text('Escolha um cargo');
        }else{
            $('#cargo-desejado-select').removeClass('input-error').addClass('input-default');
            $('.error-msg.cargo').text('');
            valida_cargo_desejado = true;
        }



        if(valida_cep_to_form === true && validacpf === true && validatel === true && valida_cargo_desejado === true && validaIMG === true){
            var data = new FormData();

            data.append('foto', foto[0]);
            data.append('cpf', cpf);
            data.append('idade', idade);
            data.append('telefone', tel);
            data.append('cep', cep);
            data.append('cidade', cidade);
            data.append('estado', estado);
            data.append('bairro', bairro);
            data.append('cargo_id', cargo_desejado);
            data.append('pcd', pcd);

            $.ajax({
                type: 'POST',
                url: base_url+'ajax/user_register_personal_data',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(json){
                    if(json.msg === 'done'){
                        $('#session-personal-data').fadeOut('100000');
                        $('#session-experiences').show();
                    }
                    if(json.msg === 'error-photo'){
                        $('.error-msg.image').text('Formato inválido ou maior que 1mb');
                        $('#preview-area').addClass('preview-error');
                    }
                }
            });
        }
    });
});