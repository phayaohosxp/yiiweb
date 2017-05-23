
<?php

use frontend\modules\pcc\models\Person;
use yii\grid\GridView;
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



$model = Person::findOne([1]);
$model->lname = "test11111";
$model->save();

$model = Person::findOne(2);
if ($model) {
    $model->delete();
}

$model = Person::find()
//       ->where(['in', 'id', [1, 2,3]])
//   ->andWhere(['prename' => 'นาย'])
;

$dataProvider = new ActiveDataProvider([
    'query' => $model
        ]);
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'before' => 'รายชื่อ Person'
    ],
]);
