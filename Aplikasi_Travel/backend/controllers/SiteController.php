<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                    //'logout' => ['post'],
                ],
            ],
        ];
    }*/

    public function actions()
    {
        return [
        'auth' => [
        'class' => 'yii\authclient\AuthAction',
        'successCallback' => [$this, 'successCallback'],
],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];

    }

 /*   public function successCallback($client)
{
$attributes = $client->getUserAttributes();
// user login or signup comes here

Checking facebook email registered yet?
Maxsure your registered email when login same with facebook email
die(print_r($attributes));


$user = \common\models\User::find()->where(['email'=>$attributes])->one();
if(!empty($user)){
Yii::$app->user->login($user);
}else{
Yii::$app->session->setFlash('danger','Email Tidak Terdaftar!');
}
}
public $successUrl = 'Success';
*/

    /**
     * @inheritdoc
     */
   

     /**
     * Displays homepage.
     *
     * @return mixed
     */
     public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() && Yii::$app->user->identity->role == 1) {
            return $this->goBack();
        } else {
            if($model->load(Yii::$app->request->post()) && $model->login() && Yii::$app->user->identity->role !== 1) {
                \Yii::$app->session->setFlash('danger','Anda hanya bisa login sebagai Administrator!');
                return Yii::$app->response->redirect(['site/logout']);;
            }
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
