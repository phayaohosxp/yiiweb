<?php

namespace frontend\modules\plktest\controllers;

use yii\web\Controller;


class DefaultController extends Controller
{
   
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionReport1(){
        echo 'Hello';
    }
}
