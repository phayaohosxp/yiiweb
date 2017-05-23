<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use frontend\modules\visit\models\CProvince;

/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\Tbperson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbperson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age_y')->textInput() ?>
     <?= $form->field($model, 'imgFile')->fileInput()->label('รูปภาพ') ?>

    <?= $form->field($model, 'addr')->textInput(['maxlength' => true]) ?>


    <?php
    $array = CProvince::find()->select('changwatcode as id,changwatname as name')->where(['zonecode' => '01'])->asArray()->all();
    $items = ArrayHelper::map($array, 'id', 'name');
    echo $form->field($model, 'prov_code')->dropDownList($items, ['id' => 'prov_code', 'prompt' => 'เลือก...'])
    ?>

    <?php
    echo $form->field($model, 'amp_code')->widget(DepDrop::classname(), [
        'data' => !empty($amp) ? $amp : [],
        'options' => ['id' => 'amp_code'],
        'pluginOptions' => [
            'depends' => ['prov_code'],
            'placeholder' => 'เลือก...',
            'url' => Url::to(['/visit/default/getamp'])
        ]
    ]);
    ?>


    <?php
    echo $form->field($model, 'tmb_code')->widget(DepDrop::classname(), [
        'data' => !empty($tmb) ? $tmb : [],
        'options' => ['id' => 'tmb_code'],
        'pluginOptions' => [
            'depends' => ['amp_code'],
            'placeholder' => 'เลือก...',
            'url' => Url::to(['/visit/default/gettmb'])
        ]
    ]);
    ?>

    <?= $form->field($model, 'dischage_code')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
