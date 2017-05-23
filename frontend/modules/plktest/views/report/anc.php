<?php
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use miloschuman\highcharts\HighchartsAsset;
HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);



$this->title ="รายงาน ncd";
$this->params['breadcrumbs'][] = ['label'=>'หน้าหลัก plktest','url'=>['/plktest/default/index']];
$this->params['breadcrumbs'][] = $this->title;
 
$form = ActiveForm::begin([
    'method'=>'GET',
    'action'=> Url::to(['/plktest/report/anc'])
]);
echo "ระหว่างวันที่:";
//echo Html::textInput('date1');
 
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        


echo "ถึง:";
//echo Html::textInput('date2');
 echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);

echo " ";
echo Html::submitButton('ประมวลผล',['class'=>'btn btn-danger']);

ActiveForm::end();


echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$xxx
]);

?>
<div id="container"></div>
<?php
$raw = $dataProvider->getModels();
/*
$data = [
    ['name'=>'อำเภอ A','y'=>100],
    ['name'=>'อำเภอ B','y'=>90],
    ['name'=>'อำเภอ C','y'=>90],
];*/
$data = [];
foreach ($raw as $value){
   $data[]=[
       'name'=>$value['hosname'],
       'y'=>$value['a']*100/$value['b']
   ] ;
}

$json = Json::encode($data);
//echo ($json);
?>


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
        name: 'หน่วยงาน',
        colorByPoint: true,
        data: $json
    }],
});
JS;
$this->registerJS($js);





