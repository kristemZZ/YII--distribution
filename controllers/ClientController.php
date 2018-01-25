<?php
namespace app\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use Yii;
class ClientController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            $url = Url::to(['passport/login']);
            return $this->redirect($url);
        }
        return true;
    }
    public function actionIndex(){

        $info = Yii::$app->user->identity;
        $data['id'] = $info->id;
        $data['name'] = $info->nickname;
        return $this->render("index",$data);
    }
}