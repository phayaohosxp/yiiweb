<?php

namespace frontend\modules\testbeta\controllers;

use yii\web\Controller;


class DefaultController extends Controller {

   
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionChartBar() {
        return $this->render('bar');
    }

    public function actionChartColumn() {
        return $this->render('column');
    }

    public function actionChartLine() {
        return $this->render('line');
    }

    public function actionChartPie() {
        return $this->render('pie');
    }

    public function actionChartGauge() {
        return $this->render('gauge');
    }

    public function actionChartDrilldown() {
        return $this->render('drilldown');
    }

}
