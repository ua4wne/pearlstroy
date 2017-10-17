<?php

use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <?= Html::img( '@web/images/logo.png', $options = ['alt'=>'Жемчужина строительства'] ) ?>
                </a>
                <p class="navbar-text">Жемчужина строительства</p>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <div class="user-panel">
                        <div class="pull-left image"><img class="img-circle" src="<?= Yii::$app->user->identity->image ?>" alt="image"></div>

                        <div class="pull-left info">
                            <p><?= Yii::$app->user->identity->fname .' '.Yii::$app->user->identity->lname ?></p>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><?= Html::a("<i class=\"fa fa-user fa-fw\"></i> Профиль", '/user/profile/index', [
                                    'data' => [
                                        'method' => 'post'
                                    ],
                                ]
                            );?>
                        </li>
                        <li class="divider"></li>
                        <li><?= Html::a("<i class=\"fa fa-sign-out\"></i> Выход", '/user/default/logout', [
                                    'data' => [
                                        'method' => 'post'
                                    ],
                                ]
                            );?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="content">
            <p>
                <a class="btn btn-primary" href="/main/cmscontent/portfolio" role="button">Портфолио</a>
            </p>
            <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]); ?>
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif;?>
            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif;?>
            <?= $content ?>

        </div>
    </div>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>