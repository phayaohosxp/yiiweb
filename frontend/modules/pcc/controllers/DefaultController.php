<?php

namespace frontend\modules\pcc\controllers;

use yii\web\Controller;
use yii\helpers\Json;
use frontend\modules\pcc\models\Ampur;
use frontend\modules\pcc\models\Tambon;

/**
 * Default controller for the `pcc` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionGetamp() {
        $parents = \Yii::$app->request->post('depdrop_parents');
        if ($parents) {
            $prov_code = $parents[0];
            $out = Ampur::find()
                    ->select('ampurcodefull as id,ampurname as name')
                    ->where(['changwatcode' => $prov_code])
                    ->asArray()
                    ->all();
            return Json::encode(['output' => $out, 'selected' => '']);
        }
    }
    public function actionGettmb() {
        $parents = \Yii::$app->request->post('depdrop_parents');
        if ($parents) {
            $amp_code = $parents[0];
            $out = Tambon::find()
                    ->select('tamboncodefull as id,tambonname as name')
                    ->where(['ampurcode' => $amp_code])
                    ->asArray()
                    ->all();
            return Json::encode(['output' => $out, 'selected' => '']);
        }
    }
}
