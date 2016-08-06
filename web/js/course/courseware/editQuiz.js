var content = $('.quiz_');
content.each(function () {
    $(this).children('.content').bind('input propertychange',function () {
       // alert($(this).val());
        $(this).siblings('.showText').html($(this).val());
    })
})