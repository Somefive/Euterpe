/**
 * Created by Somefive on 2016/5/24.
 */

$(function(){

    $('.composer').click(function(){
        var id = $(this).attr('compose-id');
        window.location.href = '/course/composer/compose?id='+id;
    });

    $('.viewer').click(function(){
        $.get("/course/composer/get-composition",{'id':$(this).attr('viewer-id')},function(rawdata){
            var data = JSON.parse(rawdata);
            if(data.status!='success')
                alert(data.detail);
            else{
                var essay = data.data;
                $('#viewer-title').html(essay.title);
                $('#viewer-content').html(essay.content);
                $('#viewer-remark').html(essay.remark);
                $('#viewer-score').html(essay.score);
                $('#viewer-date').html(essay.date);
                $('#viewer-writer').html(essay.writer);
                $('#Viewer').modal('show');
                $('.composer-normal').hide();
                $('.composer-note').hide();
                $('.composer-history').hide();
                $('.composer-comment').hide();
            }
        });
    });

    $('#Viewer').modal('hide');

});