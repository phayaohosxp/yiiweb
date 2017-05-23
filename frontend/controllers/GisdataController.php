<?php

namespace frontend\controllers;

use yii;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\db\Exception;
use yii\web\Controller;

class GisdataController extends Controller {

    protected function addRecord($prov, $amp, $tam, $namt, $name, $coord) {
        
        $sql = " REPLACE INTO gis_dhdc (PROV_CODE,AMP_CODE,TAM_CODE,TAM_NAMT,TAM_NAME,COORDINATES) ";
        $sql.= " VALUES ('$prov','$amp','$tam','$namt','$name','$coord')";

        \Yii::$app->db->createCommand($sql)->execute();
       
    }

    public function actionJsonRead() {
        $this->overclock();
        $data = file_get_contents('./gis/tambon/tambon.json');
        $data = json_decode($data, TRUE);
        $total = count($data['features']);

        for ($i = 0; $i < $total; $i++) {

            $prov = $data['features'][$i]['properties']['PROV_CODE'];

            $amp = $data['features'][$i]['properties']['AMP_CODE'];
            $amp=strlen($amp)<2?"0$amp":$amp; 

            $tam = $data['features'][$i]['properties']['TAM_CODE'];
            $tam=strlen($tam)<2?"0$tam":$tam; 

            $namt = $data['features'][$i]['properties']['TAM_NAMT'];

            $name = $data['features'][$i]['properties']['TAM_NAME'];
            // coord เป็น polygon
            $coord = json_encode($data['features'][$i]['geometry']['coordinates']);
            $coord = "[".$coord."]";
            
            try {
                $this->addRecord($prov, $amp, $tam, $namt, $name, $coord);
                echo $coord; echo "<hr>";
            } catch (\yii\db\Exception $e) {
                echo $e->getMessage();
            }
        }
    }

}
