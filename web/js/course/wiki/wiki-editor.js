$(function(){
    $('.wiki-editor-submit').click(function(){
        $.post(
            '/course/wiki/upsert-wiki',
            {
                id: $('.wiki-id').val(),
                title: $('.wiki-title').val(),
                detail: $('.wiki-detail').val()
            },
            function (data, status) {
                if(status=='success'){
                    obj = JSON.parse(data);
                    $('.modal').modal('hide');
                    alert(obj.message);
                }
            }
        );
    });
});
