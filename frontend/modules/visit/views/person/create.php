<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\Tbperson */

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'Tbpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbperson-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
