<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pcc\models\Person */
?>
<div class="person-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'prename',
            'name',
            'lname',
            'birth',
            'age',
            'addr',
            'moo',
           
              'province.changwatname',
            
            'amp_code',
            'tmb_code',
            'lat',
            'lon',
            'rapid',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
