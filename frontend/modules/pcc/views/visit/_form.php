<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="visit-form">

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($model, 'date_visit')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>


<?= $form->field($model, 'sbp')->textInput() ?>

    <?= $form->field($model, 'dbp')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['row' => 6]) ?>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
