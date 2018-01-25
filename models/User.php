<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $phone
 * @property string $password
 * @property string $token
 * @property integer $role
 * @property integer $level
 * @property integer $uptime
 * @property integer $addproxy
 * @property integer $parent_id
 * @property integer $tuijian_id
 * @property integer $status
 * @property integer $game_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $reg_ip
 * @property integer $last_login_ip
 * @property integer $birthday
 * @property string $nickname
 * @property string $city
 * @property string $province
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'password'], 'required'],
            [['role', 'level', 'uptime', 'addproxy', 'parent_id', 'tuijian_id', 'status', 'game_id', 'created_at', 'updated_at', 'reg_ip', 'last_login_ip', 'birthday'], 'integer'],
            [['phone'], 'string', 'max' => 11],
            [['password', 'token', 'nickname'], 'string', 'max' => 255],
            [['city', 'province'], 'string', 'max' => 10],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'phone' => '手机号码',
            'password' => '密码',
            'token' => '用户凭证 ',
            'role' => '角色（1 管理员 2 代理商）',
            'level' => '等级 0总代，1一代，2二代',
            'uptime' => '升级时间',
            'addproxy' => '开下级代理权限(1有权限，0没权限)',
            'parent_id' => '上级ID（为0表示一级代理）',
            'tuijian_id' => '推荐人id',
            'status' => '状态（1 正常 2 冻结）',
            'game_id' => '游戏ID',
            'created_at' => '注册时间',
            'updated_at' => '最后登录时间',
            'reg_ip' => '注册ip',
            'last_login_ip' => '最后一次登录ip',
            'birthday' => '生日',
            'nickname' => '昵称',
            'city' => '城市',
            'province' => '省份',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static $accessTokenEncryptKey = 'huogou_access_token_encrypt_key_';
    public static function findIdentityByAccessToken($accessToken, $type = null)
    {
        if (!static::isAccessTokenValid($type, $accessToken)) {
            return null;
        }
        $accessToken = base64_decode($accessToken);
        $accessToken = Yii::$app->security->decryptByKey($accessToken, static::$accessTokenEncryptKey);
        $parts = explode('_', $accessToken);
        return static::findOne(['token'=>$parts[0]]);
    }

    public static function isAccessTokenValid($type, $accessToken)
    {
        if (empty($accessToken)) {
            return false;
        }
        $accessToken = base64_decode($accessToken);
        if (!$accessToken) {
            return false;
        }
        $accessToken = Yii::$app->security->decryptByKey($accessToken, static::$accessTokenEncryptKey);
        if (!$accessToken) {
            return false;
        }
        if ($type) {
            $expire = 15552000;
        } else {
            $expire = Yii::$app->user->tokenExpire;
        }
        $parts = explode('_', $accessToken);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    public function getAccessToken()
    {
        $accessToken = $this->token . '_' . time();
        $accessToken = Yii::$app->security->encryptByKey($accessToken, static::$accessTokenEncryptKey);
        return base64_encode($accessToken);
    }
    public function generateToken()
    {
        $this->token = static::createToken();
    }

    public static function createToken()
    {
        $token = microtime(true);
        $token = 'drp_token_pre_key_' . (string) $token . mt_rand(10000000, 99999999);
        return md5($token);
    }

    public static function findByAccount($account)
    {
        $validator = new MobileValidator();
        $valid = $validator->validate($account);
        if ($valid && $user = static::findByPhone($account)) {
            return $user;
        }
        $validator = new EmailValidator();
        $valid = $validator->validate($account);
        if ($valid && $user = static::findByEmail($account)) {
            return $user;
        }
        return false;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return md5('user_auth_key_' . $this->id);
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }



    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }









    /**
     * @param int $game_id 我的game_id
     * @param int $type 是否今日新增代理
     * * @param int $month 指定月份
     * @param array $data
     * @return array 下级代理人数，代理信息
     */
   public static function nex_auth(int $game_id,int $type = 0,int $month = 0,array $data = []): array
   {
       switch ($month){
           case 0:
               if(!$type){
                   $nex_auths = static::find()->where(['tuijian_id'=>$game_id])->asArray()->all();
               }else{
                   $nex_auths = static::find()->where(['tuijian_id'=>$game_id])->andWhere(['between','created_at',strtotime('today'),strtotime('today')+86400])->asArray()->all();
               }
               $data['num'] = count($nex_auths);
               $data['users'] = $nex_auths;
               return $data;
               break;
           default :
               $str = date('Y',time());
               $begtime = strtotime($str.'-'.$month);
               $endtime = strtotime('+1 month',$begtime)-1;
               $nex_auths = static::find()->where(['tuijian_id'=>$game_id])->andWhere(['between','created_at',$begtime,$endtime])->asArray()->all();
               $data['num'] = count($nex_auths);
               $data['users'] = $nex_auths;
               return $data;
               break;
       }

   }


    /**
     * @param $game_id 代理id
     * @param $level 代理级别
     * @param $type 是否今日
     * *@param int $month 指定月份
     *  下级代理给我带来的收益
     */
   public static function auth_profit(int $game_id,int $level,int $type = 0,int $month = 0,array $data = []): float
   {
       $nex_auth = self::nex_auth($game_id); //我的下级代理
       if(isset($nex_auth) && count($nex_auth)>0){
           foreach ($nex_auth['users'] as $auth){
               //该代理的直属玩家收益
               $money = self::my_own_profit($auth['game_id'],$auth['level'],$type,$month);
               switch ($level){
                   case 1: //我是一代
                       if($auth['level'] == 2){   //该下级代理是二代 (分销一级)
                           $data[] = $money['sum_money']*0.1;
                       }elseif($auth['level'] == 1){  //该下级代理为一代
                           $data[] = $money['sum_money']*0.1;  //第二级10%
                           // (分销二级)
                           $second = self::nex_auth($auth['game_id']); //下下级代理
                           if(count($second['users']) > 0){
                               foreach ($second['users'] as $val){
                                   $second_money = self::my_own_profit($val['game_id'],$val['level'],$type,$month);
                                   $data[] = $second_money['sum_money']*0.1;  //第三级10%
                               }
                           }
                       }elseif($auth['level'] == 0){ //该下级代理为总代
                           $data[] = 0;
                       }else{
                           $data[] = 0;
                       }
                       break;
                   case 0:    //我是总代
                       if($auth['level'] == 2){   //该下级代理是二代
                           $data[] = $money['sum_money']*0.1;
                       }elseif($auth['level'] == 1){  //该下级代理为一代
                           $data[] = $money['sum_money']*0.1;   //第二级10%
                           //下下级代理
                           $second = self::nex_auth($auth['game_id']); //下下级代理
                           if(count($second['users']) > 0){
                               foreach ($second['users'] as $val){
                                   $second_money = self::my_own_profit($val['game_id'],$val['level'],$type,$month);
                                   $data[] = $second_money['sum_money']*0.1;  //第三级10%
                               }
                           }

                       }elseif($auth['level'] == 0){ //该下级代理为总代
                           $data[] = $money['sum_money']*0.1;
                           //下下级代理
                           $second = self::nex_auth($auth['game_id']); //下下级代理
                           if(count($second['users']) > 0){
                               foreach ($second['users'] as $val){
                                   $second_money = self::my_own_profit($val['game_id'],$val['level'],$type,$month);
                                   $data[] = $second_money['sum_money']*0.05;  //第三级5%
                               }
                           }
                       }else{
                           $data[] = 0;
                       }
                       break;
                   default:
                       $data[] = 0;
                       break;
               }
           }
       }
        $sum = array_sum($data);
       return $sum;

   }

   /**
    *  直属玩家，我的收益
    */
   public static function my_own_profit(int $game_id,int $level,int $type = 0,int $month = 0,array $data = []): array
   {
       $games = GameUsers::my_game_users($game_id);

       foreach ($games['users'] as $val){
           $recharge = GameRecharge::game_recharge_money($val['game_id'],$type,$month);
           $data[] = $recharge;
       }
       $sum = array_sum($data);   //玩家充值金额
       if($level == 2 ){  //二代
           $p = 0.4;
       }elseif($level == 1 ){  //一代
           $p = 0.5;
       }elseif($level == 0 ){  //总代
           $p = 0.6;
       }
       $data['profit'] = $sum*$p;
       $data['sum_money'] = $sum;
       return $data;
   }
   public static function nex_auth_recharge(int $game_id,int $level,int $type = 0,int $month = 0,array $data=[]): float
   {
        $nex_auth = self::nex_auth($game_id);
        foreach ($nex_auth['users'] as $val){
            $data[] = GameRecharge::game_recharge_money($val['game_id'],$type,$month);
        }
        $sum = array_sum($data)?array_sum($data):0;
        switch ($level){
            case "1":
                return $sum*0.5;
                break;
            case "0":
                return $sum*0.6;
                break;
            default:
                return 0;
                break;
        }
   }

    /**
     * @param $game_id  我的游戏id
     * @param $level    我的代理等级
     * @param int $type  时间段收益 1 今日 2 本周
     * @param int $month  指定月份
     * @param array $data
     * @return mixed          我的收益，包括下级代理
     */
    public static function my_all_profit(int $game_id,int $level,int $type = 0,int $month = 0): float
    {
        $profit = self::my_own_profit($game_id,$level,$type,$month); //直属玩家收益
        if($level < 2){
            $my_nex_auth_profit = self::auth_profit($game_id,$level,$type,$month);
        }else{
            $my_nex_auth_profit = 0;
        }
        //下级代理直充收益
        $money = self::nex_auth_recharge($game_id,$level,$type,$month);
        return $profit['profit']+$my_nex_auth_profit+$money;
    }

    /**
     * @param $nex_auth  下级代理信息
     * @param $level  我的代理等级
     * @param int $type 1 今日 2本周
     * @param int $month 指定月份
     * @param int $data
     * @return int|mixed
     *   该id给我来的收益
     */
    public static function to_my_profit(array $nex_auth,int $level,int $type = 0,int $month = 0,int $data = 0): float
    {
        $money = self::my_own_profit($nex_auth['game_id'],$nex_auth['level'],$type,$month);  //该代理直属玩家收益
        switch ($level){
            case 1:   //我是一代
                if($nex_auth['level'] == 2){   //该下级代理是二代
                    $data = $money['sum_money']*0.1;
                }elseif($nex_auth['level'] == 1){  //该下级代理为一代
                    $data = $money['sum_money']*0.1;
                    $second_auth = self::nex_auth($nex_auth['game_id']); //下下级代理
                    if(count($second_auth['users']) > 0){
                        $sec_data = [];
                        foreach ($second_auth['users'] as $second){
                            $seccond_money = self::my_own_profit($second['game_id'],$second['level'],$type,$month);  //该代理直属玩家收益
                            $sec_data[] = $seccond_money['sum_money']*0.1;
                        }

                        $second_data = array_sum($sec_data);
                        $data = $data+$second_data;
                    }
                }elseif($nex_auth['level'] == 0){ //该下级代理为总代
                    $data = 0;
                }else{
                    $data = 0;
                }
                //该代理直充
                $sum = GameRecharge::game_recharge_money($nex_auth['game_id'],$type,$month);
                $data = $data+$sum*0.5;
                break;
            case 0:   //我是总代
                if($nex_auth['level'] == 2){   //该下级代理是二代
                    $data = $money['sum_money']*0.1;
                }elseif($nex_auth['level'] == 1){  //该下级代理为一代
                    $data = $money['sum_money']*0.1;
                    $second_auth = self::nex_auth($nex_auth['game_id']); //下下级代理
                    if(count($second_auth['users']) > 0){
                        $sec_data = [];
                        foreach ($second_auth['users'] as $second){
                            $seccond_money = self::my_own_profit($second['game_id'],$second['level'],$type,$month);  //该代理直属玩家收益
                            $sec_data[] = $seccond_money['sum_money']*0.1;
                        }
                        $second_data = array_sum($sec_data);
                        $data = $data+$second_data;
                    }
                }elseif($nex_auth['level'] == 0){ //该下级代理为总代
                    $data = $money['sum_money']*0.1;
                    $second_auth = self::nex_auth($nex_auth['game_id']); //下下级代理
                    if(count($second_auth['users']) > 0){
                        $sec_data = [];
                        foreach ($second_auth['users'] as $second){
                            $seccond_money = self::my_own_profit($second['game_id'],$second['level'],$type,$month);  //该代理直属玩家收益
                            $sec_data[] = $seccond_money['sum_money']*0.05;  //总代横推5%
                        }
                        $second_data = array_sum($sec_data);
                        $data = $data+$second_data;
                    }
                }else{
                    $data = 0;
                }
                //该代理直充
                $sum = GameRecharge::game_recharge_money($nex_auth['game_id'],$type,$month);
                $data = $data+$sum*0.6;
                break;
            default:
                $data = 0;
                break;
        }
        return $data;
    }
}
