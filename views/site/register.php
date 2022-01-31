<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>


<?php $form = ActiveForm::begin()  ?>

<?=  $form->field($model,'username') ?>
<?=  $form->field($model,'password')->textInput(['type'=>'password']) ?>

<?= HTML::SubmitButton('Register from here', ['class'=>'btn btn-primary btn-user']) ?>
<?php ActiveForm::end() ?>