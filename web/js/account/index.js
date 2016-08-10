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
    $('.tr-enter-course').hover(function(){
        $(this).addClass('success');
    }, function(){
        $(this).removeClass('success');
    });
    $('.tr-enter-course').click(function(){
        location.href = '/course/entercourse?courseid='+$(this).attr('courseid');
    });
    $('[data-toggle="tooltip"]').tooltip();

    $('#input-basic-information-submit').click(function(){
        $.post(
            'basic-information-modify',
            {
                school: $('#input-basic-information-school').val(),
                schoolid: $('#input-basic-information-schoolid').val(),
                chname: $('#input-basic-information-chname').val(),
                enname: $('#input-basic-information-enname').val(),
                gender: $('#input-basic-information-gender').val(),
                tel: $('#input-basic-information-tel').val()
            },
            function (data, status) {
                if(status=='success'){
                    obj = JSON.parse(data);
                    alert(obj.message);
                }
            }
        )
    });

    $('#input-account-submit').click(function(){
        $.post(
            'account-modify',
            {
                password: hex_md5($('#input-password').val()),
                repassword: hex_md5($('#input-repassword').val()),
                email: $('#input-email').val()
            },
            function (data, status) {
                if(status=='success'){
                    obj = JSON.parse(data);
                    alert(obj.message);
                }
            }
        )
    });

});