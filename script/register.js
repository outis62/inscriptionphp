$(document).ready(function(){
    $(".veen .rgstr-btn button").click(function(){
        $('.veen .wrapper').addClass('move');
        $('.body').css('background','#71A2B6');
        $(".veen .login-btn button").removeClass('active');
        $(this).addClass('active');

    });
    $(".veen .login-btn button").click(function(){
        $('.veen .wrapper').removeClass('move');
        $('.body').css('background','#118AB2');
        $(".veen .rgstr-btn button").removeClass('active');
        $(this).addClass('active');
    });
});

// l'oeil pour voir le mot de passe

const eye = document.querySelector('.feather-eye');
const eyeoff = document.querySelector('.feather-eye-off');
const passwordField = document.querySelector('input[type=password]');

eye.addEventListener('click', function () {
  eye.style.display = "none";
  eyeoff.style.display = "block";
  passwordField.type = "text";
});

eyeoff.addEventListener('click', function () {
  eyeoff.style.display = "none";
  eye.style.display = "block";
  passwordField.type = "password";
});