<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="form-box">
    <?php $form = ActiveForm::begin([
        'id' => 'search-form',
        'method'=>'GET',
        'action' => Url::to(['index']),
    ]); ?>
    
    ระหว่าง:<?=Html::textInput('d_begin',$d_begin)?>
    
    ถึง:<?=Html::textInput('d_end',$d_end)?>
    <?=  Html::submitButton('ตกลง',['class'=>'btn btn-sm btn-danger'])?>
    <?php $form->end(); ?>
    
</div>
<?php
echo GridView::widget([
    'responsiveWrap'=>FALSE,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '60px',
        ],
        'val',
        [
            'attribute'=>'owner',
            'width'=>'160px',
            'filter'=> ArrayHelper::map(User::find()->all(),'username','username')
        ],
        [
            'attribute'=>'d_update',
            'format'=>'datetime',
            'width' => '60px',
        ]
        
    ],
]);
