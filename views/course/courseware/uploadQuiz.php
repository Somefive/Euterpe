<?php
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'quizFile')->fileInput(['class'=>'quiz']) ?>

	<button class="btn btn-primary">Upload</button>

<?php ActiveForm::end() ?>