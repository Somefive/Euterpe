$(function(){
    $('.editbar.foldbtn').click(function(){
        if($(this).attr('folded')=="false"){
            $(this).attr('folded','true');
            $(this).removeClass('glyphicon-resize-small');
            $(this).addClass('glyphicon-resize-full');
            $(this).parent().siblings("div").hide();
        }
        else{
            $(this).attr('folded','false');
            $(this).removeClass('glyphicon-resize-full');
            $(this).addClass('glyphicon-resize-small');
            $(this).parent().siblings("div").fadeIn();
        }
    });
    $('.favorbtn').click(function(){
        $.ajax({
            url:"/course/wiki/favor",
            data:{
                'wikiid':$(this).parent().parent().attr('wikiid')
            },
            dataType:'json',
            success:function(data){
                var wikiid = data.wikiid;
                var favor = data.favor;
                $("[wikiid="+wikiid+"]").find(".glyphicon-heart").text(favor);
            }
        });
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('span.tag').click(function(){
        window.location = '/course/wiki/index?query='+$(this).text();
    });
});