<?php

namespace frontend\modules\visit\controllers;

use Yii;
use frontend\modules\visit\models\Tbperson;
use frontend\modules\visit\models\TbpersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\visit\models\CAmpur;
use frontend\modules\visit\models\CTambon;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * PersonController implements the CRUD actions for Tbperson model.
 */
class PersonController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('ไม่อนุญาต!');
                },
                'only' => ['create', 'update', 'delete', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'index'],
                        'allow' => TRUE,
                        'roles' => ['user'],
                    ],
                     [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['user'],
                        'matchCallback' => function($rule, $action) {
                    $model = $this->findModel(\Yii::$app->request->get('id'));
                    return \Yii::$app->user->can('accessOwn', ['model' => $model, 'attr' => 'created_by']);
                }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['user'],
                        'matchCallback' => function($rule, $action) {
                    $model = $this->findModel(\Yii::$app->request->get('id'));
                    return \Yii::$app->user->can('accessOwn', ['model' => $model, 'attr' => 'created_by']);
                }
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => TRUE,
                        'roles' => ['user'],
                        'matchCallback' => function($rule, $action) {
                    $model = $this->findModel(\Yii::$app->request->get('id'));
                    return \Yii::$app->user->can('accessOwn', ['model' => $model, 'attr' => 'created_by']);
                }
                    ],
                    
                ],
            ],
        ];
    }

    /**
     * Lists all Tbperson models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TbpersonSearch();
        //$searchModel->created_by = \Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbperson model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tbperson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tbperson();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model->upload();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tbperson model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $amp = CAmpur::find()
                ->select('ampurcodefull as id,ampurname as name')
                ->where(['changwatcode' => $model->prov_code])
                ->asArray()
                ->all();
        $amp = ArrayHelper::map($amp, 'id', 'name');

        $tmb = CTambon::find()
                ->select('tamboncodefull as id,tambonname as name')
                ->where(['ampurcode' => $model->amp_code])
                ->asArray()
                ->all();
        $tmb = ArrayHelper::map($tmb, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->upload();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'amp' => $amp,
                        'tmb' => $tmb
            ]);
        }
    }

    /**
     * Deletes an existing Tbperson model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbperson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbperson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tbperson::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
