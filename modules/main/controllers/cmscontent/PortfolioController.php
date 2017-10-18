<?php

namespace app\modules\main\controllers\cmscontent;

use Yii;
use app\modules\main\models\Portfolios;
use app\modules\main\models\PortfoliosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\main\models\UploadImage;
use yii\web\UploadedFile;

/**
 * PortfolioController implements the CRUD actions for Portfolios model.
 */
class PortfolioController extends Controller
{
    public $layout = 'cms';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['adminTask']
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Portfolios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortfoliosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => [
                'pageSize' => Yii::$app->params['page_size'],
            ],
        ]);
    }

    /**
     * Displays a single Portfolios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Portfolios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Portfolios();
        $upload = new UploadImage();
        if ($model->load(Yii::$app->request->post())) {
            $upload->image = UploadedFile::getInstance($upload, 'image');
            $upload->upload();
            //обновляем данные картинки
            $model->images = '/images/'.$upload->image->name;
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        $filter = ['design'=>'Строительство и реконструкция', 'apartments'=>'Отделка квартир', 'cottages'=>'Коттеджи', 'network'=>'Инженерные сети'];
        $def = 'design';
        return $this->render('create', [
            'model' => $model,
            'upload' => $upload,
            'filter' => $filter,
            'def' => $def
        ]);
    }

    /**
     * Updates an existing Portfolios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload = new UploadImage();
        if ($model->load(Yii::$app->request->post()) ) {
            $upload->image = UploadedFile::getInstance($upload, 'new_image');
            if(!empty($upload->image)){
                //обновляем данные картинки
                $model->images = '/images/'.$upload->image->name;
                $upload->upload();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $filter = ['design'=>'Строительство и реконструкция', 'apartments'=>'Отделка квартир', 'cottages'=>'Коттеджи', 'network'=>'Инженерные сети'];
            $def = $model->filter;
            return $this->render('update', [
                'model' => $model,
                'upload' => $upload,
                'filter' => $filter,
                'def' => $def
            ]);
        }
    }

    /**
     * Deletes an existing Portfolios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfolios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
