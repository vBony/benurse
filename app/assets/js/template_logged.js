$(document).ready(function(){
    var base_url = "http://localhost/benurse/";

    $('#user-stats-header').hover(function(){
        $('#name-ush').css('color', '#22B14C');
        $('.fas.fa-angle-down').css('color', '#22B14C');
    }, function(){
        $('#name-ush').css('color', '#4A4A4A');
        $('.fas.fa-angle-down').css('color', '#4A4A4A');
    });

    $('#sair-ddd').on('click', function(){
        document.location.href = base_url+'user/logout';
    })

    $('#user-stats-header').on('click', function(){
        $('#drop-down-desktop').slideToggle('fast');
    })
});