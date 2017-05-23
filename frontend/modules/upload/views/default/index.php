<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'dataFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>