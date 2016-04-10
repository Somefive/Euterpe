<?php
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/course/courseware/uploadCourseware.js');
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'coursewareFile')->fileInput(['class'=>'file']) ?>
	<?= $form->field($model, 'title')->textInput() ?>

	<button class="btn btn-primary">Upload</button>

<?php ActiveForm::end() ?>