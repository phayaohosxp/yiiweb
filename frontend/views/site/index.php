<link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet"> 

<style>
    body {
        font-family: 'Prompt', sans-serif;
        font-size: 16px;
    }
    h1 {
        font-family: 'Prompt', sans-serif;
    }
</style>

<?php

use yii\helpers\ArrayHelper;

$array1 = ['a' => 'AA',
    'b', 'c', 10];
$no_array = 10;





$array = [];
$array[] = 'you';
$arry['y'] = 'ME';
$array['x'] = date('Y-m-d');

$array2 = ['a', 'b'];

$all = ArrayHelper::merge($array, $array2);


echo "<hr>";
echo "<pre>";
print_r($array);
echo "</pre>";
echo "<hr>";


echo "<pre>";
print_r($all);
echo "</pre>";
echo "<hr>";

