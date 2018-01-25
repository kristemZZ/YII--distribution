<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    private $_user = false;
    private $_username_type;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // username is validated by validateUsername()
//            ['username', 'validateUsername'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }

    public function validateUsername($attribute, $params)
    {
//        $mobileValidator = new MobileValidator();
//        $valid = $mobileValidator->validate($this->username);
//        //是否存在
//        $user = $this->getUser();
//        if($user){
//            return;
//        }else{
//            $this->addError($attribute, '登录密码错误，请重新输入.');
//        }

        /*$emailValidator = new EmailValidator();
        $valid = $emailValidator->validate($this->username);
        if ($valid) {
            $this->_username_type = 'email';
            return;
        }*/
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user) {
                $this->addError('username', '账户不存在.');
            } elseif (!$user->validatePassword($this->password)) {
                $this->addError($attribute, '登录密码错误，请重新输入.');
            } else {
                if ($user->status==0) {
                    $this->addError('username', '账户被冻结，请联系客服.');
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login($duration = 86400)
    {
        if ($this->validate()) {
            $logined =  Yii::$app->user->login($this->getUser(), $duration);
            if ($logined) {
                $ip = Yii::$app->request->userIP;
            }
            return $logined;
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return \app\models\User |null
     */
    public function getUser()
    {
        if ($this->_user == false) {
            $this->_user = User::findByPhone(trim($this->username));
//            if ($this->_user == false) {
//                $this->_user = User::findOne(['quid' => trim($this->username)]);
////                $this->_user = User::findByEmail($this->username);
////                if ($this->_user == false) {
////                    $this->_user = User::findOne(['quid' => $this->username]);
////                }
//            }
        }
        return $this->_user;
    }
}
