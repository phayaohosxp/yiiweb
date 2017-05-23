<?php

namespace frontend\modules\pcc\controllers;
use yii\web\Controller;
use frontend\modules\pcc\models\Person;
use yii\data\ActiveDataProvider;

class TestController extends Controller{
    
    public function actionTest1(){
        return $this->render('test1');
    }
    
    public function actionTest2($id,$name){
        $model = Person::find()
                ->where(['id'=>$id]);
        
        $dataProvider = new ActiveDataProvider([
            'query'=>$model
        ]);
        
        return $this->render('test2',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
}

