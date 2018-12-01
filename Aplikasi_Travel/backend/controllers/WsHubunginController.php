<?php
namespace backend\controllers;

use Yii;
use backend\models\Hubungin;
 
class WsHubunginController extends \yii\rest\Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        /*$behaviors['authenticator'] = [
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    [
                        'class' => QueryParamAuth::className(),
                        'tokenParam' => 'session_token'
                    ],
                    [
                        'class' => HttpBasicAuth::className(),
                        'auth' => false
                    ]
                ]
        ];
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'text/html' => Response::FORMAT_JSON,
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
            ],
        ];*/
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];
        return $behaviors;
    }
 
    protected function verbs()
    {
       return [
           'index' => ['GET'],
       ];
    }
 
    public function actionIndex(){
        $result = Hubungin::find()->all();
    
        return $result;
    }

    public function actionView($id)
    {   
        $result = $this->findModel($id);

        return $result;
    }

    protected function findModel($id)
    {
        if (($model = Hubungin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}