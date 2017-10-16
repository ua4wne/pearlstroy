<?php

namespace app\modules\main\controllers;

use app\modules\main\models\Portfolios;

class PortfoliosController extends \yii\web\Controller
{
    public $layout = 'basic';

    public function actionIndex()
    {
        $portfolios = Portfolios::find()->all();
        return $this->render('index',[
            'portfolios' => $portfolios,
        ]);
    }

}
