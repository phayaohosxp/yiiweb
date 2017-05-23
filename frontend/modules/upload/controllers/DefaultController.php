<?php

namespace frontend\modules\upload\controllers;

use yii\web\Controller;
use frontend\modules\upload\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Default controller for the `upload` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new UploadForm();

        if (\Yii::$app->request->isPost) {
            $model->dataFile = UploadedFile::getInstance($model, 'dataFile');
            if ($model->upload()) {
                // file is uploaded successfully
                \Yii::$app->session->setFlash('success',"OK");
                return $this->render('index', ['model' => $model]);
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
