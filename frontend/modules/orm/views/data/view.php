<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */
?>
<div class="data-view">
 <?=  Html::img('../../uploads/img_'.$model->id.'.png')?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'val',
            'owner',
        ],
    ]) ?>
    

</div>
