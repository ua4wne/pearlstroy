<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\models\PasswordResetForm */
$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="login_form col-md-4 col-md-offset-4">
        <div class="user-default-password-reset">
            <h1><?= Html::encode($this->title)  ?></h1>

            <p>Введите новый пароль</p>

            <div class="login_form row">
                <?php $form = ActiveForm::begin(['id' => 'password-reset-form']); ?>
                    <div class="form-group">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>