$(function(){
    $('.wiki-editor-submit').click(function(){
        $.post(
            '/course/wiki/upsert-wiki',
            {
                id: $('.wiki-id').val(),
                title: $('.wiki-title').val(),
                detail: $('.wiki-detail').val(),
                tag: $('.wiki-tag').val()
            },
            function (data, status) {
                if(status=='success'){
                    obj = JSON.parse(data);
                    $('.modal').modal('hide');
                    alert(obj.message);
                    if(obj.status)
                        location.reload();
                }
            }
        );
    });
});

function loadWikiEditorWithUpdate(id,title,detail,tag){
    $('.wiki-id').val(id);
    $('.wiki-title').val(title);
    $('.wiki-detail').val(detail);
    $('.wiki-tag').val(tag);
    $('.modal').modal("show");
}

function loadWikiEditorWithInsert(){
    $('.wiki-id').val("");
    $('.wiki-title').val("");
    $('.wiki-detail').val("");
    $('.wiki-tag').val("");
    $('.modal').modal("show");
}

function deleteWiki(id){
    $.post(
        '/course/wiki/delete-wiki',
        {
            id: id
        },
        function (data, status) {
            if(status=='success'){
                obj = JSON.parse(data);
                alert(obj.message);
                if(obj.status==true)
                    location.reload();
            }
        }
    );
}