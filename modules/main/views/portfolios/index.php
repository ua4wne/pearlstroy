<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Жемчужина строительства';
/* @var $this yii\web\View */
?>
<!-- subheader begin -->
<div id="subheader">
    <h1>Наши работы.</h1>
</div>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul id="filters">
                    <li><a href="#" data-filter="*" class="selected">Все</a></li>
                    <li><a href="#" data-filter=".new">Новые</a></li>
                    <li><a href="#" data-filter=".apartments">Отделка квартир</a></li>
                    <li><a href="#" data-filter=".cottages">Коттеджи</a></li>
                    <li><a href="#" data-filter=".design">Архитектурный дизайн</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div id="gallery" class="gallery">
                <?php foreach ($portfolios as $portfolio) :?>
                    <!-- <h4>Изображение проекта -->
                    <div class="span3 item news">
                        <a class="preview" href="<?= $portfolio->images ?>" data-gal="prettyPhoto" title="<?= $portfolio->name ?>">
                            <img src="images/pic-blank-1.gif" data-original="<?= $portfolio->images ?>" alt="">
                        </a>
                        <?= $portfolio->text ?>
                    </div>
                    <!-- close <h4>Изображение проекта -->
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
<!-- content close -->