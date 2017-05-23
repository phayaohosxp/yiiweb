<?php
use yii\helpers\Html;
use kartik\grid\GridView;
echo Html::a('ไป test1',['/pcc/test/test1']);

echo GridView::widget([
    'dataProvider'=>$dataProvider
]);


