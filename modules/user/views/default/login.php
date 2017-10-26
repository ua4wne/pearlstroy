<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


    <div class="row">
        <div class="login_form col-md-4 col-md-offset-4">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); ?>
            <h3>Авторизация</h3>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="row">
                <div class="col-md-8 form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                </div>
                <div class="col-md-4 form-group">
                <?= Html::a('Сбросить пароль', ['/user/default/password-reset-request'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

