<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body>
<!-- header begin -->

<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="logo"/></a>
                <h4>Жемчужина строительства</h4>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/#aboutUs">О компании</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Виды работ <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/#project">Проектные работы</a></li>
                            <li><a href="/#build">Строительство</a></li>
                            <li><a href="/#repair">Ремонт и отделка</a></li>
                            <li><a href="/#operation">Эксплуатация</a></li>
                        </ul>
                    </li>
                    <li><a href="/#service">Услуги</a></li>
                    <li><a href="/contact#message">Заявка</a></li>
                    <li><a href="/main/portfolio">Портфолио</a></li>
                    <li><a href="/contact">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- header close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                <?= $content; ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

</div>
<!-- content close -->

<!-- footer begin -->
<footer>
    <div class="container">
        <div class="row">
            <div class="span6">
                &copy; 2017 Construction - бесплатный строительный шаблон | <a href="http://html6.com.ru">Шаблоны сайтов</a>
            </div>
            <div class="span6">
                <nav>
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Услуги</a></li>
                        <li><a href="#">Связь</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</footer>
<!-- footer close -->

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
