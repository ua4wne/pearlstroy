<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
?>
<div class="main-contact">
        <!-- subheader begin -->
        <h1>Контакты</h1>
        <!-- subheader close -->

        <div id="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.3044183329685!2d37.58574101623447!3d55.874733880586135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b537115de5b045%3A0x7c0bbd84026bc10c!2z0JDQu9GC0YPRhNGM0LXQstGB0LrQvtC1INGILiwgNDQsIDEyLCDQnNC-0YHQutCy0LAsIDEyNzU2Ng!5e0!3m2!1sru!2sru!4v1508224470749" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <hr>

        <!-- content begin -->

        <div class="row">
            <section id= "message">
                <div class="span8">
                    <div class="contact_form_holder">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'captchaAction' => '/main/contact/captcha',
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </section>

            <div id="sidebar" class="span4">
                <!-- widget category -->
                <!-- widget tags -->
                <!-- widget text -->
                <div class="widget widget-opening-hours">
                    <h4 class="title"><span>Время работы</span></h4>
                    <ul class="opening-hours">
                        <li><span class="op-days">Понедельник - Пятница</span><span class="op-time">09:00 - 21:00</span></li>
                    </ul>
                </div>

                <div class="widget widget-text">
                    <h4 class="title"><span>Мы находимся</span></h4>
                    <address>
                        <div><span class="glyphicon glyphicon-home" aria-hidden="true"></span> г.Москва, Алтуфьевское шоссе, д.44, оф.12</div>
                        <div><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +7(916)423-24-72</div>
                        <div><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> aleynikov@inbox.ru</i></div>
                        <div><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> www.pearlstroy.ru</i></div>
                    </address>
                </div>

            </div>
        </div>
</div>
