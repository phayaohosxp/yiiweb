<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pcc\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = ['label'=>'ทะเบียน','url'=> ['/pcc/person/index']];
$this->params['breadcrumbs'][] = 'รายการเยี่ยม';
?>
<div class="visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เยียม', ['create','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //  'id',
           // 'person_id',
            'date_visit',
            'weight',
            'height',
            [
                'attribute' => 'sbp',
                'value' => function($model) {
                    return $model->sbp . "/" . $model->dbp;
                }
            ],
            //  'dbp',
            'note',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
