<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 12:18
 */
namespace app\controllers;

use app\models\GetCodeForm;
use app\models\UserCards;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\Response;


class CardController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $url = Url::to(['passport/login']);
            return $this->redirect($url);
        }
        return true;
    }
    public function actionGetcode(){
        $clapi  = new \app\controllers\ChuanglanSmsApi();
        $userinfo = Yii::$app->user->identity;
        $phone = $userinfo->phone;
        $code = rand(1000,9999);
        if(!Yii::$app->session->isActive){
            Yii::$app->session->open();
        }
        $result = $clapi->sendSMS( $phone,"【蛮子游戏】您的验证码是：".$code."，有效期10分钟。切勿告知他人。快乐在手心，老友在身边");
        Yii::$app->session->set('login_sms_code',$code);
        Yii::$app->session->set('login_sms_time',time());
        $data['code'] = substr($phone,-4);
        $data['phone'] = $phone;
        return $this->render("getcode",$data);
    }
    public function actionNext(){
        $data['GetCodeForm'] = Yii::$app->request->post();
        $model = new GetCodeForm();
        $cardinfo = UserCards::findOne(['game_id'=>$data['GetCodeForm']['game_id']]);
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($model->load($data) && $model->validate()){
            if($cardinfo->card_num){
                $url = Url::to(['/card/addcard']);
            }else{
                $url = Url::to(['/card/modify']);
            }
            return ['error'=>0, 'url'=>$url];
        }else {
            if(is_array($model->getFirstErrors())){
                foreach ($model->getFirstErrors() as $val){
                    $error = $val;
                    break;
                }
            }else{
                $error = '操作有误';
            }
            return ['error'=>1, 'message'=>$error];
        }
    }
    public function actionBank(){
        return $this->render("bank");
    }
    public function actionAddcard(){
        $userinfo = Yii::$app->user->identity;
        $data['cardinfo'] = UserCards::findOne(['game_id'=>$userinfo->game_id]);
        return $this->render("addcard",$data);
    }
    public function actionModify(){
        $userinfo = Yii::$app->user->identity;
        $data['cardinfo'] = UserCards::findOne(['game_id'=>$userinfo->game_id]);
        return $this->render("modifycard",$data);
    }
    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isAjax){
            $userinfo = Yii::$app->user->identity;
            $card = UserCards::findOne(['game_id'=>$userinfo->game_id]);
            $post = $request->post();
            $card->name = trim($post['name']);
            $card->id_card = trim($post['id_card']);
            $card->bank_name = trim($post['bank_name']);
            $card->branch_name = trim($post['branch_name']);
            $card->card_num = trim($post['card_num']);
            $res = $card->save();
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($res){
                $url = Url::to(['/default/mydata']);
                return ['error'=>0,'url'=>$url];
            }else{
                return ['error'=>1,'message'=>"修改银行卡信息失败"];
            }
        }
    }
}