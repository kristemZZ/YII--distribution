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
class FastLoginForm extends Model
{
    public $username;
    public $password;
    private $_user = false;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
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
                return;
            }
            $code = intval($this->password);
            $signup_sms_code = intval(Yii::$app->session->get('login_sms_code'));
            $signup_sms_time = Yii::$app->session->get('login_sms_time');
            if($code && $code!=$signup_sms_code){
                $this->addError($attribute, '短信验证码不正确!');
            }
            if($code && time()-$signup_sms_time > 600){
                $this->addError($attribute, '短信验证码已超时，请重新获');
                Yii::$app->session->remove('login_sms_code');
                Yii::$app->session->remove('login_sms_time');
            }
            return;
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
        }
        return $this->_user;
    }
}
