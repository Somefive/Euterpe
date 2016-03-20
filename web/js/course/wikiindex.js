/**
 * Created by Administrator on 2016/3/15.
 */
$(function(){
    $('.tr-enter-wiki').hover(function(){
        $(this).addClass('success');
    }, function(){
        $(this).removeClass('success');
    });
    $('.tr-enter-wiki').click(function(){
        location.href = '/course/wiki/enterwiki?wikiid='+$(this).attr('wikiid');
    });
    $('[data-toggle="tooltip"]').tooltip();
});