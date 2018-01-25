<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/11
 * Time: 11:55
 */

namespace app\controllers;
use app\models\GameRecharge;
use app\models\GameUsers;
use yii\web\Controller;
use yii\helpers\Json;
use Yii;

class ApiController extends Controller
{
    private $SERVER_WEB_KEY = "DQk90.3tWWq.Y";
    private function checkSign($request){
        $sign = isset($request['sign']) ? trim($request['sign']) : '';
        $timestamp = isset($request['timestamp']) ? trim($request['timestamp']) : '';
        $token = isset($request['token']) ? trim($request['token']) : '';
        if(!$sign or !$timestamp or !$token){
            echo Json::encode(['error' => 1, 'message' => '调用API的参数不正确']);
            exit;
        }
        if(time()-$timestamp > 30){
            echo Json::encode(['error' => 1, 'message' => '调用']);
            exit;
        }
        if($token != base64_encode("manziyouxi")){
            echo Json::encode(['error' => 1, 'message' => '调用API的token参数不正确']);
            exit;
        }
        $crypt = crypt("time".$timestamp."token".$token,$this->SERVER_WEB_KEY);
        if($crypt != $sign){
            echo Json::encode(['error' => 1, 'message' => '调用API的sign参数错误']);
            exit;
        }
        return true;
    }
    public function actionRegister(){
        $request = Yii::$app->request->get();
        if($this->checkSign($request)){
            $data = Json::decode($_POST['data'],true);
            $model = new GameUsers();
            $model->game_id = $data['game_id'];
            $model->wechat = $data['wechat'];
            $model->reg_time = $data['reg_time'];
            $model->parent_id = $data['parent_id'];
            $model->header_url = $data['header_url'];
            $model->bean = $data['bean'];
            $model->nickname = $data['nickname'];
            $model->role = 3;
            $res = $model->save();
            if($res){
                file_put_contents('/home/www/distribution/api_gameusers_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 0, 'message' => '传输成功']);
            }else{
                file_put_contents('/home/www/distribution/api_gameusers_error_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 1, 'message' => '传输失败']);
            }
        }
    }
    public function actionRecharge(){
        $request = Yii::$app->request->get();
        if($this->checkSign($request)){
            $data = Json::decode($_POST['data'],true);
            $model = new GameRecharge();
            $model->game_id = $data['game_id'];
            $model->money = $data['money'];
            $model->rec_time = $data['rec_time'];
            $model->type = $data['type'];
            $res = $model->save();
            if($res){
                file_put_contents('/home/www/distribution/web/api_recharge_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 0, 'message' => '传输成功']);
            }else{
                file_put_contents('/home/www/distribution/web/api_recharge_error_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 1, 'message' => '传输失败']);
            }
        }
    }
    public function actionBinding(){
        $request = Yii::$app->request->get();
        if($this->checkSign($request)){
            $data = Json::decode($_POST['data'],true);
            $user = GameUsers::find()->where(['game_id'=>trim($data['game_id'])])->one();
            $user->parent_id = $data['parent_id'];
            $res = $user->save();
            if($res){
                file_put_contents('/home/www/distribution/web/api_binding_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 0, 'message' => '传输成功']);
            }else{
                file_put_contents('/home/www/distribution/web/api_binding_error_'.date('Y-m').'.log',date('Y-m-d H:i:s',time()).'---------->'.print_r($data,true).PHP_EOL,FILE_APPEND);
                echo Json::encode(['error' => 1, 'message' => '传输失败']);
            }
        }
    }
}
