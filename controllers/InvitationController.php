<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 12:18
 */
namespace app\controllers;

use app\helpers\JSSDK;
use app\helpers\MyRedis;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\Response;


class InvitationController extends Controller
{
    public function beforeAction($action)
    {
//        if (Yii::$app->user->isGuest) {
//            $url = Url::to(['passport/login']);
//            return $this->redirect($url);
//        }
        return true;
    }
    public function actionIndex(){
        $data['user'] = Yii::$app->user->identity;
        $id = Yii::$app->request->get();
        if(Yii::$app->user->isGuest){
            $url = Url::to(['/invitation/share','p'=>$id['p']]);
            return $this->redirect($url);
        }
        $redis = new MyRedis();
        if($src = $redis->get($id['p'])){
            $data['url'] = $src;
        }
        //获取微信
        $jssdk = new JSSDK("wx721f9b2105f691bf","7c04c7195c1be43f38c916240a40cbe1");
        $data['config'] = $jssdk->getSignPackage();
        $data['link'] = "http://".$_SERVER["HTTP_HOST"]."/invitation/share?p=".$id['p'];
        $data['img'] = "http://".$_SERVER["HTTP_HOST"]."/src/images/share.png";
        return $this->render("index",$data);
    }
    public function actionShare(){
        if(!Yii::$app->user->isGuest){
            $info = Yii::$app->user->identity;
            $url = Url::to(['/invitation/index',"p"=>$info->game_id]);
            return $this->redirect($url);
        }
        $redis = new MyRedis();
        $id = Yii::$app->request->get();
        $data['id'] = $id['p'];
        $data['url'] = $redis->get($data['id']);
        if(!$data['url']){
            $data['url'] = Yii::$app->params['skinUrl']."/src/images/web.png";
        }
        return $this->render("share",$data);
    }
    public function actionDataurl(){
        $request = Yii::$app->request;
        if($request->isAjax){
            $post = $request->post();
            $redis = new MyRedis();
            $redis->set(Yii::$app->user->identity->game_id,$post['url']);
//            Yii::$app->session->set("url",$post['url']);
//            Yii::$app->session->set("id",Yii::$app->user->identity->game_id);
        }
    }

}