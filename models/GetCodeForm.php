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
class GetCodeForm extends Model
{
    public $code;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['code'], 'required'],

            ['code', 'validateCode'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => '验证码',
        ];
    }

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


}
