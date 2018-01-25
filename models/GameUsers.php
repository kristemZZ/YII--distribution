<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_users".
 *
 * @property integer $id
 * @property integer $game_id
 * @property integer $parent_id
 * @property integer $reg_time
 * @property string $wechat
 * @property integer $role
 * @property string $header_url
 * @property integer $bean
 * @property string $nickname
 */
class GameUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'reg_time', 'role'], 'required'],
            [['game_id', 'parent_id', 'reg_time', 'role', 'bean'], 'integer'],
            [['wechat', 'header_url', 'nickname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => '玩家id',
            'parent_id' => '上级代理id',
            'reg_time' => '注册时间',
            'wechat' => '微信号',
            'role' => '角色，3玩家，2二代，1一代,0总代',
            'header_url' => '头像url',
            'bean' => '蛮豆数量',
            'nickname' => '昵称 ',
        ];
    }

    /**
     * @param $game_id
     * @param int $type 1 今日 0 所有玩家
     * @param int $month 数字月份
     * @param array $data
     * @return array （type 1 今日新增玩家）代理玩家个数 和信息
     */
    public static function my_game_users(int $game_id, int $type = 0,int $month = 0,array $data = []): array
    {
        switch ($month){
            case 0:
                if(!$type){
                    $user = static::find()->where(['parent_id'=>$game_id])->andWhere(['role'=>3])->asArray()->all();
                }else{
                    $user = static::find()->where(['parent_id'=>$game_id])->andWhere(['role'=>3])->andWhere(['between','reg_time',strtotime('today'),strtotime('today')+86400])->asArray()->all();
                }
                $data['num'] = count($user);
                $data['users'] = $user;
                return $data;
                break;
            default :
                $str = date('Y',time());
                $begtime = strtotime($str.'-'.$month);
                $endtime = strtotime('+1 month',$begtime)-1;
                $user = static::find()->where(['parent_id'=>$game_id])->andWhere(['role'=>3])->andWhere(['between','reg_time',$begtime,$endtime])->asArray()->all();
                $data['num'] = count($user);
                $data['users'] = $user;
                break;
        }

    }
}
