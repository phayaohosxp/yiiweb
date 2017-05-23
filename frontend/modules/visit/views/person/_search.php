<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\TbpersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbperson-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>





    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'age_y') ?>

    <?php // echo $form->field($model, 'addr') ?>

    <?php // echo $form->field($model, 'prov_code') ?>

    <?php // echo $form->field($model, 'amp_code') ?>

    <?php // echo $form->field($model, 'tmb_code') ?>

    <?php // echo $form->field($model, 'dischage_code') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'note')  ?>


    <div class="form-group input-group">
        <?= $form->field($model, 'glob_find')->label(FALSE) ?>
        <span class="input-group-btn">
            <?= Html::submitButton(' <i class="glyphicon glyphicon-search"></i> ', ['class' => 'btn btn-primary','style'=>'margin-top:10px']) ?>  
        </span>
    </div>


    <?php ActiveForm::end(); ?>

</div>
