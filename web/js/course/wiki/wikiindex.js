/**
 * Created by Administrator on 2016/3/15.
 */
$(function(){

    $('#focuswikisubmit').click(function(){
        $('#wiki-form').submit();
    });
    $('.newwiki').click(function(){
        $('#operateID').val('create');
        $('#wiki-id').val('');
        $('#wiki-title').val('');
        $('#wiki-detail').val('');
        $('#wiki-tag').val('');
        $('#WikiModal').modal('show');
    });
    $('.editbtn').click(function(){
        $('#operateID').val('edit');
        var wikiid = $(this).parent().parent().attr('wikiid');
        $('#wiki-id').val(wikiid);
        $('#wiki-title').val($(this).siblings('.panel-title').text());
        $('#wiki-detail').val($(this).parent().siblings('.panel-body').text());
        $('#wiki-tag').val($(this).parent().siblings('.panel-tag').text());
        $('#WikiModal').modal('show');
    });
    $('.deletebtn').click(function(){
        $('#operateID').val('delete');
        var wikiid = $(this).parent().parent().attr('wikiid');
        $('#wiki-id').val(wikiid);
        $('#wiki-title').val($(this).siblings('.panel-title').text());
        $('#wiki-detail').val($(this).parent().siblings('.panel-body').text());
        $('#wiki-tag').val($(this).parent().siblings('.panel-tag').text());
        $('#wiki-form').submit();
    });


});