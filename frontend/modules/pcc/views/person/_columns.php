<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\modules\pcc\models\Province;
use yii\helpers\ArrayHelper;
use frontend\modules\pcc\models\Ampur;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'rapid', 
         'label'=>'',
         'format'=>'Html',
         'contentOptions'=>function($model){
            return ['style'=>"background-color:$model->rapid"];
         },
         'filter'=>['green'=>'green','yellow'=>'yellow'],
         'value'=>function($model){
              return Html::a('<i class="glyphicon glyphicon-search"></i>',['/pcc/visit/index','pid'=>$model->id],['class'=>'btn btn-default btn-sm']);            
         }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'prename',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'lname',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'birth',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'age',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'addr',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'moo',
    // ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'prov_code',
         'value'=>function($model){
             return $model->province->changwatname;
         },
          'filter'=> ArrayHelper::map(Province::find()->all(),'changwatname','changwatname')
    ],
   [
         'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'amp_code',
       'value'=>function($model){
             return $model->ampur->ampurname;
         }
   ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'tmb_code',
         'value'=>function($model){
             return $model->tambon->tambonname;
         }
         
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lat',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'lon',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'rapid',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_by',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_by',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },        
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   