<?php

namespace app\modules\main\controllers;

use app\modules\main\models\ContactForm;
use yii\web\Controller;
use Yii;

class ContactController extends Controller
{
    public $layout = 'basic';
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success','Ваше сообщение отправлено!');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

}
