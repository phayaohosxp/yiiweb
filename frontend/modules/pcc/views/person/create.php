<?php

use yii\helpers\Html;

?>
<div class="person-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<?php
$js=<<<JS
        //alert();
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(loc){
        
   
       $('#person-lat').val(loc.coords.latitude);
        $('#person-lon').val(loc.coords.longitude);
        
  });
}
JS;

$this->registerJs($js);
