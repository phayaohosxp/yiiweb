<?php

namespace frontend\modules\plktest\controllers;

//use yii\web\Controller;
use yii\data\ArrayDataProvider;
use common\components\AppController;
use frontend\modules\plktest\models\AncSearch;

class ReportController extends AppController {

    public function actionNcd($date1 = NULL, $date2 = NULL) {
        //$this->permitRole([1,2,3]);

        $sql = " SELECT p.check_hosp HOSPCODE,h.hosname HOSNAME

,COUNT(DISTINCT CONCAT(l.cid,'-',l.bdate)) B
,COUNT(DISTINCT IF( a.g1_ga <=12, CONCAT(a.cid,'-',a.bdate),NULL)) A

FROM	t_labor l 
INNER JOIN t_person_cid p ON l.cid=p.cid
INNER JOIN chospital_amp h ON p.check_hosp=h.hoscode
LEFT JOIN t_person_anc a ON l.cid=a.cid AND l.bdate =a.bdate
WHERE p.check_typearea in(1,3) AND p.discharge IN(9)
AND p.nation in(99)  
"; //1

        if (!empty($date1) and ! empty($date2)) {
            $sql.="AND l.BDATE BETWEEN '$date1' AND '$date2' ";
        }

        $sql.=" GROUP BY p.check_hosp ";


        $raw = \Yii::$app->db->createCommand($sql)->queryAll(); //2

        $dataProvider = new ArrayDataProvider([//3
            'allModels' => $raw
        ]);

        return $this->render('ncd', [ //4
                    'dataProvider' => $dataProvider,
                    'date1' => $date1,
                    'date2' => $date2
        ]);
    }

    public function actionMom() {
        
    }

    public function actionKpiNcd() {
        $data = 'OK';
        return $this->render('kpi-ncd', [
                    'data' => $data,
                    'data2' => 'ข้อมูล 2'
        ]);
    }
    public function actionAnc($date1=NULL,$date2=NULL){
        $xxx = new AncSearch($date1,$date2);
        $dataProvider = $xxx->search(\Yii::$app->request->queryParams);
        return $this->render('anc',[
            'dataProvider'=>$dataProvider,
            'xxx'=>$xxx,
            'date1'=>$date1,
            'date2'=>$date2
        ]);
    }

}
