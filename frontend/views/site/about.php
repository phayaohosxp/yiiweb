<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?php if (\Yii::$app->user->can('delete')): ?>
    delete ได้
    <?php endif; ?>
</div>
