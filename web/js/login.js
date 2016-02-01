/**
 * Created by Somefive on 2016/2/1.
 */
$(function(){
    $('.E-login').click(function(){
        $('#loginform-password').val(hex_md5($('#loginform-password').val()));
        $('#login-form').submit();
    });
});