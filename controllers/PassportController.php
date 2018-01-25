<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 12:18
 */
namespace app\controllers;


use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\CheckyzcodeForm;
use app\models\FastLoginForm;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\helpers\Json;
use yii\captcha\CaptchaValidator;
use app\models\User;


class PassportController extends Controller
{public $enableCsrfValidation = false;
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                //'backColor'=>0x000000,//背景颜色
                'maxLength' => 4, //最大显示个数
                'minLength' => 4,//最少显示个数
                //'padding' => 5,//间距
                'height'=>40,//高度
                'width' => 100,  //宽度
                'testLimit'=>10,
                'testLimit'=>10,
                'offset'=>4,
                'fontFile'=>'@yii/captcha/proximanova.ttf',
                // 'foreColor'=>0xffffff,     //字体颜色
                //'offset'=>4,        //设置字符偏移量 有效果
                //'controller'=>'login',        //拥有这个动作的controller
            ],
        ];
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;
            if ($role == 1) {
//                $url = Url::to(['admin/default/index']);
            } elseif ($role == 2) {
                $url = Url::to(['default/index']);
            }
            return $this->redirect($url);
        }
        $request = Yii::$app->request;
        $model = new LoginForm();
        if ($request->isPost) {
            $response = Yii::$app->response;
            $data['LoginForm'] = $request->post();
            if ($model->load($data) && $model->login()) {
                $role = Yii::$app->user->identity->role;
                if ($role == 1) {
//                    $url = Url::to(['admin/default/index']);
                } elseif ($role == 2) {
                    $url = Url::to(['default/index']);
                }
//                $id = Yii::$app->user->identity->id;
//                $db = Yii::$app->db;
//                $sql = "SELECT * from users WHERE id = $id";
//                $user=$db->createCommand($sql)->queryOne();

                $response->format = Response::FORMAT_JSON;
                return ['url'=>$url, 'error'=>0];

            } else {
                $response->format = Response::FORMAT_JSON;
                if(is_array($model->getFirstErrors())){
                    foreach ($model->getFirstErrors() as $v){
                        $error = $v;
                        break;
                    }
                }else{
                    $error = '登录失败';
                }
                return ['error'=>1, 'message'=>$error];
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * 快速登录
     */
    public function actionFastlogin(){
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;
            if ($role == 1) {
//                $url = Url::to(['admin/default/index']);
            } elseif ($role == 2) {
                $url = Url::to(['default/index']);
            }
            return $this->redirect($url);
        }

        $request = Yii::$app->request;
        if($request->isPost){
            $response = Yii::$app->response;
            $model = new FastLoginForm();
            $data['FastLoginForm'] = $request->post();
            if($model->load($data) && $model->login()){
                $role = Yii::$app->user->identity->role;
                if ($role == 1) {
//                    $url = Url::to(['admin/default/index']);
                } elseif ($role == 2) {
                    $url = Url::to(['default/index']);
                }
                $response->format = Response::FORMAT_JSON;
                return ['error'=>0, 'url'=>$url];
            }else{
                $response->format = Response::FORMAT_JSON;
                if(is_array($model->getFirstErrors())){
                    foreach ($model->getFirstErrors() as $val){
                        $error = $val;
                        break;
                    }
                }else{
                    $error = '登录失败';
                }
                return ['error'=>1, 'message'=>$error];
            }
        }
        return $this->render('fastlogin');
    }
    public function actionRegister()
    {
        $request = Yii::$app->request;
        $model = new CheckyzcodeForm();
        if ($request->isPost) {
            $response = Yii::$app->response;
            $data1['CheckyzcodeForm'] = $request->post();
            if ($model->load($data1) && $model->validate()) {
                $user = $model->register();
                if ($user) {
                    $url = Url::to(['/passport/login']);
                    $response->format = Response::FORMAT_JSON;
                    return ['error'=>0, 'message'=>'注册成功','url'=>$url];
                }else{
//                    $url = Url::to(['/passport/register']);
                    $response->format = Response::FORMAT_JSON;
                    if(is_array($model->getFirstErrors())){
                        foreach ($model->getFirstErrors() as $val){
                            $error = $val;
                            break;
                        }
                    }else{
                        $error = '注册失败';
                    }
                    return ['error'=>1, 'message'=>$error];
                }
            } else {
//                $url = Url::to(['/passport/register']);
                $response->format = Response::FORMAT_JSON;
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
        return $this->render('register', ['model' => $model]);
    }
    public function actionCheck()
    {
        $request = Yii::$app->request;
        $model = new RegisterForm();
        if ($request->isPost) {
            echo '<pre>';var_dump($request->post());exit;
            $response = Yii::$app->response;
            if ($model->load($request->post()) && $model->validate()) {
                $url = Url::to(['/passport/login']);
                $response->format = Response::FORMAT_JSON;
                return ['url'=>$url, 'error'=>0];
            } else {
                $response->format = Response::FORMAT_JSON;
                return ['error'=>1, 'message'=>$model->getFirstErrors()];
            }
        }
        //return $this->render('register', ['model' => $model]);
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
        Yii::$app->getUser()->logout();
    }
        return $this->redirect(['/passport/login']);
    }

    public function actionDetail()
    {
        $data['title'] = '注册奖励';
        return $this->render('detail', $data);
    }

    public function actionSendcode()
    {
        $clapi  = new \app\controllers\ChuanglanSmsApi();
        $phone=$_POST['phone'];
        $code=$_POST['code'];
        if(!Yii::$app->session->isActive){
            Yii::$app->session->open();
        }
        Yii::$app->session->set('login_sms_code','1111');
        Yii::$app->session->set('login_sms_time',time());
        echo Json::encode(['error' => 0, 'msg' => '短信验证码发送成功']);
        //测试数据
        $result = $clapi->sendSMS( $phone,"【蛮子游戏】您的验证码是：".$code."，有效期10分钟。切勿告知他人。快乐在手心，老友在身边");
        if(!is_null(json_decode($result))){
            $output=json_decode($result,true);
            if(isset($output['code'])  && $output['code']=='0'){
                if(!Yii::$app->session->isActive){
                    Yii::$app->session->open();
                }
                Yii::$app->session->set('login_sms_code',$code);
                Yii::$app->session->set('login_sms_time',time());
                echo Json::encode(['error' => 0, 'msg' => '短信验证码发送成功']);
                exit;
            }else{
                echo Json::encode(['error' => 1, 'msg' => $output['errorMsg']]);
                exit;
            }
        }else{
            echo $result;
        }

    }

    public function actionFindpwd(){
        $request = Yii::$app->request;
        if($request->isPost){
            $response = Yii::$app->response;
            $data = $request->post();
            if(isset($data['code']) && isset($data['phone']) && isset($data['password']) && $data['password'] == $data['passwords']){
                $user = User::findone(['phone'=>$data['phone']]);
                $code = trim($data['code']);
                $response->format = Response::FORMAT_JSON;
                if($user){
                    $signup_sms_code = intval(Yii::$app->session->get('login_sms_code'));
                    $signup_sms_time = Yii::$app->session->get('login_sms_time');
                    if($code && $code!=$signup_sms_code){
                        return ['error'=>1, 'message'=>'验证码不正确'];
                    }
                    if($code && time()-$signup_sms_time > 600){
                        return ['error'=>1, 'message'=>'短信验证码已超时，请重新获'];
                    }
                    else{
                        $user ->setPassword(trim($data['password']));
                        $res = $user->save();
                        if($res){
                            Yii::$app->session->remove('login_sms_code');
                            Yii::$app->session->remove('login_sms_time');
                            $url = Url::to(['/passport/login']);
                            return ['error'=>0,'url'=>$url];
                        }else{
                            return ['error'=>1,'url'=>'修改失败，请重新修改'];
                        }
                    }
                }else{
                    return ['error'=>1, 'message'=>'帐号不存在'];
                }
            }
        }
        return $this->render('findpwd');
    }

    public function actionEditpwd(){
        session_start();
        $UPDATE_INFO_URL = "http://fx.jinkagame.com/mp/updatepasswordbyquid";
        $smsArr = isset($_COOKIE['verify']) ? explode("#", trim($_COOKIE['verify'])) : [];
        if(!empty($smsArr)){
            if(md5($smsArr[0].$smsArr[1]."mpxiaoyao") != $smsArr[2]){ 
                echo "非法请求";exit;
            }
        }else{
            echo "非法请求";exit;
        }

        if(isset($_POST['password'])){
            $quid  = $_SESSION['quid'];
            $password = trim($_POST['password']); 
            $ret = file_get_contents($UPDATE_INFO_URL."?quid=".$quid."&password=".$password."&sign=".md5("password".$password."quid".$quid."fx@#ca&hyxz"));
            echo "修改成功";
            exit;
        }
        $data['title'] = '找回密码';
        return $this->render('editpwd', $data);
    }
}