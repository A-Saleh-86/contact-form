$( function () {

    'use strict';
    var userError = true;
    var emailError = true;
    var msgError = true;
    var submitBtn = document.getElementById('submit-btn');

    function checkError () {
        if (userError === true || emailError === true || msgError === true) {

            submitBtn.disabled = true;
            $(submitBtn).css('background-color','rgb(227 3 3)');
            
        } else {
            
            submitBtn.disabled = false;

            $(submitBtn).css('background-color','rgb(65 171 65)');
        }
    }

    checkError();

    $('.username').blur( function () {

        if($(this).val().length < 4) {

            userError = true;
            
            $(this).css('border','1px solid rgb(227 3 3)');

            $(this).parent().find('.asterisk').fadeIn('100');

            $(this).parent().find('.custom-alert-user').fadeIn('200');

        } else {

            $(this).css('border','1px solid rgb(65 171 65)');

            $(this).parent().find('.asterisk').fadeOut('100');

            $(this).parent().find('.custom-alert-user').fadeOut('200');

            userError = false;

        }

        checkError();
        });


    $('.email').blur( function () {

        if($(this).val() === '') {

            emailError = true;

            $(this).css('border','1px solid rgb(227 3 3)');

            $(this).parent().find('.asterisk').fadeIn('100');

            $(this).parent().find('.custom-alert-email').fadeIn('200');

        } else {
            
            $(this).css('border','1px solid rgb(65 171 65)');

            $(this).parent().find('.asterisk').fadeOut('100');

            $(this).parent().find('.custom-alert-email').fadeOut('200');

            emailError = false;

        }

        checkError();
    });


    $('.msg').blur( function () {

        if($(this).val().length < 11 ) {

            msgError = true;

            $(this).css('border','1px solid rgb(227 3 3)');

            $(this).parent().find('.asterisk').fadeIn('100');

            $(this).parent().find('.custom-alert-msg').fadeIn('200');

        } else {
            
            $(this).css('border','1px solid rgb(65 171 65)');

            $(this).parent().find('.asterisk').fadeOut('100');

            $(this).parent().find('.custom-alert-msg').fadeOut('200');

            msgError = false;

        }
        checkError();
    });


});

