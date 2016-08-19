<div class="modal fade wiki-editor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Wiki Editor</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Title</span>
                    <input type="text" class="form-control" name="wiki-title">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon">Detail</span>
                    <textarea class="form-control" name="wiki-detail" rows="6"></textarea>
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon">Tag</span>
                    <input type="text" class="form-control" name="wiki-tag">
                </div>
                <br/>
                <div class="alert alert-success" role="alert">
                    Use semicolon(;) to seperate different tags.
                </div>
                <input type="hidden" name="wiki-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary wiki-editor-submit">Submit</button>
            </div>
        </div>
    </div>
</div>
<?= \yii\helpers\Html::jsFile("/js/course/wiki/wiki-editor.js")?>
<script>
    $('.modal').modal('show');
</script>