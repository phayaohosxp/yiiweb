<?php
use frontend\modules\pcc\models\Person;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/*
$model = new Person();

$data =[    
    'prename'=>'นาง',
    'name'=>'abc',
    'lname'=>'ใจดี'
];
$model->attributes = $data;
$model->save(); 
*/
$model = Person::findOne([2,3,4]);
$model->lname = "ใจไม่ดี";
$model->save();

$model = Person::findOne(5);
if($model){
    $model->delete();
}


$model = Person::find();

$dataProvider = new ActiveDataProvider([
    'query'=>$model
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'panel'=>[
        'before'=>''
    ]
]);




