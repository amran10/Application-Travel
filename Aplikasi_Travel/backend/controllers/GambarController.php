<?php

namespace backend\controllers;

use Yii;
use backend\models\Gambar;
use backend\models\GambarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
 
/**
 * GambarController implements the CRUD actions for Gambar model.
 */
class GambarController extends Controller
{
    /**
     * @inheritdoc
     */
   /* public function behaviors()
    {
        return [
         'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'ruleConfig' => [
                            'class' => \common\models\AccessRules::className(),
                        ],
                        'only' => ['logout','login','index','update','view','delete','create'],
                        'rules' => [
                            // allow authenticated users
                        [
                            'actions' => ['login'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['index','logout','update','view','delete','create'],
                            'allow' => true,
                            'roles' => ['1'],
                        ],
                        [
                            'actions' => ['delete','create'],
                            'allow' => false,
                            'roles' => ['1'],
                        ],
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => [''],
                            'allow' => true,
                            'roles' => ['?','0'],
                        ],
                            // everything else is denied
                        ],
                    ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
*/
    /**
     * Lists all Gambar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GambarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gambar model.
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
     * Creates a new Gambar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
       public function actionCreate()
    {
        $model = new Gambar();

        if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto = UploadedFile::getInstance($model, 'foto');
             
            if ($model->validate()) {
                // upload foto
                $model->foto->saveAs(
                    Url::to('@common/uploads/Gambar/') . $model->foto);
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id_foto]);
            }else {
                return $this->render('create', [
            'model'=>$model
            ]);
            }
                       
        }
         
        return $this->render('create', [
            'model'=>$model
            ]);
    }


    /**
     * Updates an existing Gambar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto = UploadedFile::getInstance($model, 'foto');
             
            if ($model->validate()) {
                // upload foto
                $model->foto->saveAs(
                    Url::to('@common/uploads/Gambar/') . $model->foto);
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id_foto]);
            }else {
                return $this->render('create', [
            'model'=>$model
            ]);
            }
                       
        }
         
        return $this->render('update', [
            'model'=>$model
            ]);
    }

    /**
     * Deletes an existing Gambar model.
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
     * Finds the Gambar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gambar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gambar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
