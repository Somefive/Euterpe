/**
 * Created by Somefive on 2016/2/1.
 */
$(function(){
    $('.E-register').click(function(){
        var password = $('#registerform-password');
        var repassword = $('#registerform-repassword');
        if(password.val()!=repassword.val())
        {
            alert('两次输入密码不一致！');
            return;
        }
        password.val(hex_md5(password.val()));
        repassword.val(hex_md5(repassword.val()));
        $('#register-form').submit();
    });
});