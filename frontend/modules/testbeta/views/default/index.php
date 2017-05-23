<?php
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;

$date = date('Ymd');


echo Html::button('click ', ['id'=>'btn-ok','data'=>$date]);

$route = Url::to(['/site/index','data'=>$date]);
$js =<<<JS
     $('#btn-ok').click(function(){
        var date=$(this).attr("data");
        var win=window.open("$route&data2="+date,"win","top=100,left=200,width=600,height=400");
     });   
JS;
$this->registerJs($js);
      

