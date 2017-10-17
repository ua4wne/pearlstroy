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

        <div class="row">
            <div class="span12">
                <ul id="filters">
                    <li><a href="#" data-filter="*" class="selected">Все</a></li>
                    <li><a href="#" data-filter=".design">Строительство и реконструкция</a></li>
                    <li><a href="#" data-filter=".apartments">Отделка квартир</a></li>
                    <li><a href="#" data-filter=".cottages">Коттеджи</a></li>
                    <li><a href="#" data-filter=".network">Инженерные сети</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div id="gallery" class="gallery">
                <?php foreach ($portfolios as $portfolio) :?>
                    <!-- <h4>Изображение проекта -->
                    <div class="span3 item <?= $portfolio->filter ?>">
                        <a class="preview" href="<?= $portfolio->images ?>" data-gal="prettyPhoto" title="<?= $portfolio->name ?>">
                            <img src="images/pic-blank-1.gif" data-original="<?= $portfolio->images ?>" alt="">
                        </a>
                        <h4><?= $portfolio->name ?></h4>
                        <span><?= $portfolio->text ?></span>
                    </div>
                    <!-- close <h4>Изображение проекта -->
                <?php endforeach; ?>
            </div>
        </div>


<!-- content close -->

<?php
$js = <<<JS
    $(document).ready(function() {
        $("a.fancyimage").fancybox();
        $("a").fancybox({
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
        });
    });
JS;
$this->registerJs($js);
?>