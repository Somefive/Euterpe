/**
 * Created by Somefive on 2016/2/2.
 */
$(function(){
    $('.E-accountmodify').click(function(){
        var password = $('#accountform-password');
        var repassword = $('#accountform-repassword');
        var username = $('#accountform-username');
        if(password.val()!=repassword.val())
        {
            alert('两次输入密码不一致！');
            return;
        }
        password.val(hex_md5(password.val()));
        repassword.val(hex_md5(repassword.val()));
        username.attr('disabled','false');
        $('#account-form').submit();
        username.attr('disabled','true');
    });
    $('.E-accountreset').click(function(){
        $('#accountform-password').val('');
        $('#accountform-repassword').val('');
        $('#accountform-email').val($('#accountform-oldemail').val());
    });
});