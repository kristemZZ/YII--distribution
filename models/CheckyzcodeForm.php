<?php

namespace app\models;

//use app\helpers\Game;
use app\helpers\Common;
use app\services\User as UserService;
use app\validators\MobileValidator;
use yii\base\Model;
use Yii;
use yii\validators\EmailValidator;

class CheckyzcodeForm extends Model
{
    public $game_id;
    public $token;
    public $password;
    public $phone;
    public $code;
    public $tuijian_id;
    public $nickname;
//    public $verifyCodemb;
//    public $spreadSource;
//    public $parentCode;
//    public $gameUserId;
//    public $isRead;
//    private $_parent_id;
//    private $_username_type;
//    private $_nick_name;
//    private $_headimgurl;
//    private $_level;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['game_id', 'token','phone','code', 'password'], 'required'],
            ['phone', 'validatePhone'],
            ['game_id', 'validateGameId'],
            ['token', 'validateToken'],
            ['code', 'validateCode'],



            //['verifyCode', 'captcha','captchaAction'=>'/passport/captcha','message'=>'{attribute}有误'],
//            ['isRead', 'validateRead'],
//            ['password','\app\validators\PasswordValidator'],
//            ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'message'=>'两次密码不一致'],
//            ['smsCode', 'validateSmsCode', 'on'=>'registerCheck', 'skipOnEmpty'=>false],
            //['verifyCode', 'captcha','captchaAction'=>'/passport/captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'token' => '代理注册码',
            'game_id' => '游戏ID',
            'phone' => '手机号',
            'code' => '短信验证码',
            'password' => '密码',
        ];
    }

    /**
     * @return bool检测token是否合法
     */
    public function validateToken($attribute, $params){
        $token = Auth::findOne(['my_token'=>$this->token,'game_id'=>$this->game_id]);
        if(!$token){
            $this->addError($attribute, '该邀请码无效.');
        }else{
            $this->tuijian_id = $token['parent_id'];
        }
        return;
    }



    /**
     * @param $attribute
     * @param $params 检测该手机号码时候已经注册
     */
    public function validatePhone($attribute, $params)
    {
        $user = User::findByPhone($this->phone);
        if ($user) {
            $this->addError($attribute, '账号已注册.');
        }
        return;
//        $emailValidator = new EmailValidator();
//        $valid = $emailValidator->validate($this->username);
//        if ($valid) {
//            $this->_username_type = 'email';
//            $user = User::findByEmail($this->username);
//            if ($user) {
//                $this->addError($attribute, '账号已注册.');
//            }
//            return;
//        }
    }


    /**
     * @param $attribute
     * @param $params检测短信验证码
     */
    public function validateCode($attribute, $params)
    {
        $code = $this->code;
        $signup_sms_code = intval(Yii::$app->session->get('login_sms_code'));
        $signup_sms_time = Yii::$app->session->get('login_sms_time');
        if($code && $code!=$signup_sms_code){
            $this->addError($attribute, '短信验证码不正确!');
        }
        if($code && time()-$signup_sms_time > 600){
            $this->addError($attribute, '短信验证码已超时，请重新获');

        }
        else{
            Yii::$app->session->remove('login_sms_code');
            Yii::$app->session->remove('login_sms_time');
            return;
        }
        return;

    }

    /**
     * @param $attribute
     * @param $params 检测游戏id
     */
    public function validateGameId($attribute, $params)
    {
        $game_info = \app\models\GameUsers::findOne(['game_id'=>$this->game_id]);
        if(!$game_info){
            $this->addError($attribute, '游戏ID不存在');
            return;
        }
        if (User::findOne(['game_id' => $this->game_id])) {
            $this->addError($attribute, '游戏ID已绑定');
            return;
        }
        $this->nickname = $game_info['nickname'];
        return;
    }

    /**
     * @param $attribute
     * @param $params 检测是否已读协议
     */
    public function validateRead($attribute, $params)
    {
        if ($this->isRead != 1) {
            $this->addError($attribute, '请阅读协议');
        }
    }

    /**
     * @return User|bool   注册该用户
     */
    public function register()
    {
        $user = new User();
//        if ($this->_username_type == 'email') {
//            $user->email = $this->username;
//        } elseif ($this->_username_type == 'phone') {
//            $user->phone = $this->username;
//        } else {
//            return false;
//        }
//        // 保存头像
//        if (@fopen($this->_headimgurl, 'r')) {
//            $basename = Image::generateName() . '.jpg';
//            $fullPath = Image::getUserFaceFullPath($basename, 'org');
//            $dir = dirname($fullPath);
//            !is_dir($dir) && mkdir($dir, 0777, true);
//            Image::saveImageFromUrl(str_replace('/96', '/132', $this->_headimgurl), $fullPath);
//            Image::createUserFaceImage($fullPath,$basename,0,0,0,0);
//            $user->avatar = $basename;
//        }
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $time = time();
        $user->created_at = $time;
        $user->updated_at = $time;
        $user->uptime = $time;
        $user->reg_ip = ip2long(Yii::$app->request->userIP);
        $user->role = 2;
        $user->level = 2;
        $user->status = 1;
        $user->nickname = $this->nickname;
        $user->tuijian_id = $this->tuijian_id;
        $user->game_id = $this->game_id;
        $save = $user->save() ? $user : false;
//        UserService::editBalance($user->id, User::REG_MONEY, UserBalanceFollowDistribution::TYPE_REG_MONEY, 0);
        return $save;
    }
}