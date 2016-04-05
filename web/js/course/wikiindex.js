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

$(function(){

    $('.panel-heading').click(function(){
        if($(this).attr('folded')=="false"){
            $(this).attr('folded','true');
            $(this).siblings("div").fadeOut();
        }
        else{
            $(this).attr('folded','false');
            $(this).siblings("div").fadeIn();
        }
    });
    $('#focuswikisubmit').click(function(){
        $('#wiki-form').submit();
    });

});