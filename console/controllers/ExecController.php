<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class ExecController extends \yii\console\Controller {

  public function actionInit(){
     $auth = \Yii::$app->authManager;
     $user = $auth->getRole('user');
     $admin = $auth->getRole('admin');
     $auth->addChild($admin, $user);
    
     
  }

}
?>