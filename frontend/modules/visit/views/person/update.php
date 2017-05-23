<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\Tbperson */

$this->title = 'Update Tbperson: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbperson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'amp'=>$amp,
        'tmb'=>$tmb
    ]) ?>

</div>
