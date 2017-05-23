<?php

namespace frontend\modules\visit\controllers;

use yii\web\Controller;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\modules\visit\models\CAmpur;
use frontend\modules\visit\models\CTambon;

/**
 * Default controller for the `visit` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetamp() {
        $parents = \Yii::$app->request->post('depdrop_parents');
        if ($parents) {
            $prov_code = $parents[0];
            $out = CAmpur::find()
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
            $out = CTambon::find()
                    ->select('tamboncodefull as id,tambonname as name')
                    ->where(['ampurcode' => $amp_code])
                    ->asArray()
                    ->all();
            return Json::encode(['output' => $out, 'selected' => '']);
        }
    }

}
