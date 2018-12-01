<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
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
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Berita();
        $model->tgl_berita = date("Y-m-d");

        if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto_berita = UploadedFile::getInstance($model, 'foto_berita');
             
            if ($model->validate()) {
                // upload foto
                $model->foto_berita->saveAs(
                    Url::to('@common/uploads/Berita/') . $model->foto_berita);
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id_berita]);
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
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto_berita = UploadedFile::getInstance($model, 'foto_berita');
             
            if ($model->validate()) {
                // upload foto
                $model->foto_berita->saveAs(
                    Url::to('@common/uploads/Berita/') . $model->foto_berita);
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id_berita]);
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
     * Deletes an existing Berita model.
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
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
