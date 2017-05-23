<?php
use yii\helpers\Html;

echo "OK test1";
echo "<hr>";
?>
<b> HTML tag </b><br>
<?php

echo Html::a('<i class="glyphicon glyphicon-ok"></i> ไป test2',['/pcc/test/test2','id'=>1,'name'=>'a'],['class'=>'btn btn-success']);

