<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use frontend\modules\pcc\models\Province;
use frontend\modules\pcc\models\Ampur;
use frontend\modules\pcc\models\Tambon;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $items = [
        'นาง' => 'นาง',
        'นาย' => 'นาย',
        'นางสาว' => 'นางสาว'];
    ?>

    <?=
    $form->field($model, 'prename')->dropDownList($items, ['prompt' => '--โปรดเลือก--'])
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'birth')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'วดป.เกิด...'],
        'pickerButton' => [
            'icon' => 'calendar',
        ],
        'language' => 'th',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ])
    ?>

    <?= $form->field($model, 'addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moo')->textInput(['maxlength' => true]) ?>

    <?php
    $array = Province::find()
            ->where(['zonecode' => '01'])
            ->all();
    $item = ArrayHelper::map($array, 'changwatcode', 'changwatname');
    ?>

    <?=
    $form->field($model, 'prov_code')->widget(Select2::classname(), [
        'data' => $item,
        'language' => 'th',
        'options' => ['placeholder' => ' จังหวัด...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $x = $model['prov_code'];
    $array2 = Ampur::find()
            ->where(['changwatcode' => '$x'])
            ->all();
    $item2 = ArrayHelper::map($array2, 'ampurcodefull', 'ampurname');
    ?>

    <?= $form->field($model, 'amp_code')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tmb_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rapid')->textInput(['maxlength' => true]) ?>



    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i glyphicon glyphicon-ok ></i> เพิ่ม' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
