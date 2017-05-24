<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <link href="https://fonts.googleapis.com/css?family=Prompt:300" 
              rel="stylesheet"> 
        <style>
            body {
                font-family: 'Prompt', sans-serif;
                font-size: 16px;
            }
            h1 {
                font-family: 'Prompt', sans-serif;
            }
        </style>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '<i class="glyphicon glyphicon-home"></i>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-custom navbar',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'DHDC', 'url' => ['/site/about']],
                ['label' => 'Audit', 'url' => ['/site/contact']],
                ['label' => 'PERSON', 'url' => ['/pcc/person']],
                 ['label' => 'แผนที่', 'url' => ['/pcc/map']],
                [
                    'label' => 'รายงาน 1',
                    'items' => [
                        ['label' => 'QOF', 'url' => '#'],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">ผล Audit</li>',
                        '<li class="divider"></li>',
                        ['label' => 'ผล DHDC', 'url' => '#'],
                        '<li class="divider"></li>',
                        ['label' => 'แผนปฏิบัติงาน', 'url' => '#'],
                    ],
                ],
                [
                    'label' => 'รายงาน 2',
                    'items' => [
                        ['label' => 'QOF', 'url' => '#'],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">ผล Audit</li>',
                        '<li class="divider"></li>',
                        ['label' => 'ผล DHDC', 'url' => '#'],
                        '<li class="divider"></li>',
                        ['label' => 'แผนปฏิบัติงาน', 'url' => '#'],
                    ],
                ],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user"></span> ' . \Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => 'เมนู 1', 'url' => '#'],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">menu header</li>',
                        ['label' => '<span class="glyphicon glyphicon-off"></span> Logout', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => [['label' => 'เขตบริการสุขภาพที่ 1']],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                <?= Alert::widget() ?>

                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; You <?= date('Y') ?></p>

                <p class="pull-right"><?php echo "โดย สสจ พะเยา"; ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
