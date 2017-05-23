<?php

namespace frontend\modules\dao\controllers;

use yii\web\Controller;
use frontend\modules\dao\models\RptSearch;

/**
 * Default controller for the `dao` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($d_begin=NULL,$d_end=NULL)
    {
        $searchModel = new RptSearch($d_begin,$d_end);
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'd_begin'=>$d_begin,
                    'd_end'=>$d_end
        ]);
    }
}
