$(document).ready(function () {
  $(".veen .rgstr-btn button").click(function () {
    $('.veen .wrapper').addClass('move');
    $('.body').css('background', '#22333B');
    $(".veen .login-btn button").removeClass('active');
    $(this).addClass('active');

  });
  $(".veen .login-btn button").click(function () {
    $('.veen .wrapper').removeClass('move');
    $('.body').css('background', '#5D737E');
    $(".veen .rgstr-btn button").removeClass('active');
    $(this).addClass('active');
  });
});

