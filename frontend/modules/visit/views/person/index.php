<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\visit\models\TbpersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbperson-index">
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'prename',
            'name',
            'lname',
            'birth',
            // 'sex',
            // 'age_y',
            // 'addr',
            //'prov_code',
            [
                'attribute' => 'prov_code',
                'value' => 'prov.changwatname'
            ],
            //'amp_code',
            [
                'attribute' => 'amp_code',
                'value' => 'ampur.ampurname'
            ],
            //'tmb_code',
            [
                'attribute' => 'tmb_code',
                'value' => 'tambon.tambonname'
            ],
            // 'dischage_code',
            // 'color',
            // 'note:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
