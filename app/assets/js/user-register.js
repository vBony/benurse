$(document).ready(function(){
    var doneVar = 'F';
    var nome = '';
    var coren = '';
    var estado = '';

    // Primeira seção (nome, coren e estado)
    $('#estado-coren').on('keyup', function(){
        this.value = this.value.replace(/[^A-Za]/g,'');
    });
    
    $('#username').on('keyup', function(){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });

    $('#username').on('blur', function(){
        if($(this).val().length < 1 || $(this).val().indexOf(' ') == -1){
            $(this).removeClass('input-default');
            $(this).addClass('input-default-error');
        }if($(this).val().length > 8){
            $(this).removeClass('input-default-error');
            $(this).addClass('input-default');
        }
    });




});