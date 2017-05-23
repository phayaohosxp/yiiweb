<?php

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);

$data = [
    ['name'=>'อำเภอ A','y'=>100],
    ['name'=>'อำเภอ B','y'=>90],
];
$b = [['name'=>'อำเภอ C','y'=>45]];

$data=ArrayHelper::merge($data,$b);
$data[]=['name'=>'อำเภอ D','y'=>90];

$json = Json::encode($data);
echo ($json);
?>

<div id="container"></div>

<?php
$js = <<<JS
Highcharts.chart('container', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'chart'
    },
    subtitle: {
        text: ''
    },
    
     xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    series:[{
        name: 'อำเภอ',
        colorByPoint: true,
        data: $json
    }],
});
JS;

$this->registerJS($js);
