<?php

namespace app\modules\user\controllers;

use app\modules\user\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use app\modules\user\models\PasswordResetForm;
use app\modules\user\models\PasswordResetRequestForm;
//use app\models\BaseModel;
use app\modules\user\models\User;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/modules/main/views/layouts/cms.php';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPasswordResetRequest()
    {
        $this->layout = 'basic';
        $model = new PasswordResetRequestForm($this->module->passwordResetTokenExpire);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                //return $this->goHome();
                return $this->redirect('/cms');
            } else {
                throw new NotFoundHttpException('Возникла ошибка при попытке отправки запроса на смену пароля пользователя <strong>'. $model->getUser()->username .'</strong> на email <strong>'. $model->email .'</strong>.');

            }
        }
        return $this->render('passwordResetRequest', [
            'model' => $model,
        ]);
    }

    public function actionPasswordReset($token)
    {
        $user = User::findByPasswordResetToken($token);
        $this->layout = 'basic';
        try {
            $model = new PasswordResetForm($token, $this->module->passwordResetTokenExpire);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            return $this->redirect('/cms');
        }
        return $this->render('passwordReset', [
            'model' => $model,
        ]);
    }
}
