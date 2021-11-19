$(function () {

    'use strict';

    //Dashbiord 
    $('.toggle-info').click(function () {
        $(this).toggleClass('selected').parent.next('.panel-body').fadeToggle(100);

        if($(this).hasClass('selected')) {
            $(this).html('<i class="fa fa-minus fa-lg"></i>');
        }else {
            $(this).html('<i class="fa fa-plus fa-lg"></i>');
        }
    });

    //Hide PlaceHolder on Form Focus

    $('[placeholder]').focus(function () {
        $(this).attr('data-text',$(this).attr('placeholder'));

        $(this).attr('placeholder','');
    }).blur(function () {
        $(this).attr('placeholder',$(this).attr('data-text'));
    });

    //Menu Hover
    $(document).ready(function(){
        $(".dropdown").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });  

    //Carousel 5s for each picture
    $(document).ready(function() {
        $('.carousel').carousel({
            interval:5000
        });
    });

    //Add Asterisk On requierd Field

    $('input').each(function () {
        if($(this).attr('requierd') === 'requierd') {
            $(this).after('<span class="asterisk">*</span>');
        }
    });

    // Confirmation Message on Button

    $('.confirm').click(function () {

        return confirm('Are You Sure?');

    });

    // Category View Option
    $('.cat h3').click(function () {

        $(this).next('.full-view').fadeToggle(300);

    });

    $('.option span').click(function () {

        $(this).addClass('active').siblings('span').removeClass('active');

        if($(this).data('view') === 'full'){
            $('.cat .full-view').fadeIn(300);
        }else {
            $('.cat .full-view').fadeOut(300);
        }
    });
});





