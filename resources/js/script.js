$(document).ready(() => {
    //Login and Register
    $('#login-form-link').click((event) => {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(event.currentTarget).addClass('active');
        event.preventDefault();
    });

    $('#register-form-link').click((event) => {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(event.currentTarget).addClass('active');
        event.preventDefault();
    });
});