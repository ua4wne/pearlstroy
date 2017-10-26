<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Portfolios */

$this->title = 'Обновление записи';
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portfolios-update">

    <h1>Обновление записи: <?= Html::encode($model->name) ?></h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?= Html::img(Url::toRoute($model->images),[
            'alt'=>'image',
            //'style' => 'width:700px;',
            //'class'=>'img-circle'
            ]); ?>
        </div>
    </div>

    <div class="portfolios-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'images')->textInput(['maxlength' => true]) ?>
        <?= $form->field($upload, 'new_image')->fileInput() ?>

        <?//= $form->field($model, 'filter')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'filter')->dropDownList($filter,['options' =>[ $def => ['Selected' => true]]]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
