/**
 * Created by Somefive on 2016/4/5.
 */
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

});