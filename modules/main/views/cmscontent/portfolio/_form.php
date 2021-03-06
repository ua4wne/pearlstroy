<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Portfolios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolios-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'images')->textInput(['maxlength' => true]) ?>
    <?= $form->field($upload, 'image')->fileInput() ?>

    <?//= $form->field($model, 'filter')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'filter')->dropDownList($filter,['options' =>[ $def => ['Selected' => true]]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
