/**
 * Created by Administrator on 2016/3/15.
 */
$(function(){

    $('.wiki-create').click(function(){
        loadWikiEditorWithInsert();
    });
    $('.editbtn').click(function(){
        loadWikiEditorWithUpdate(
            $(this).parent().parent().attr('wikiid'),
            $(this).siblings('.panel-title').text(),
            $(this).parent().siblings('.panel-body').text(),
            $(this).parent().siblings('.panel-tag').val()
        );
    });
    $('.deletebtn').click(function(){
        deleteWiki($(this).parent().parent().attr('wikiid'));
    });


});