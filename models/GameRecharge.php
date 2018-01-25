<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_recharge_copy".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $money
 * @property string $type
 * @property integer $rec_time
 */
class GameRecharge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_recharge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'money', 'rec_time'], 'required'],
            [['game_id', 'rec_time'], 'integer'],
            [['money', 'type'], 'string', 'max' => 255],
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
            'money' => '充值金额',
            'type' => '充值方式',
            'rec_time' => '充值时间',
        ];
    }

    /**
     * @param int $game_id 玩家id
     * @param int $type 是否查询今日下级玩家充值 2 查询本周
     * @param int $month 指定月份
     * @return array|int|mixed|\yii\db\ActiveRecord[]
     *  获取玩家充值金额
     */
    public static function game_recharge_money($game_id,$type = 0,$month = 0,$money = 0){
        switch ($month){
            case 0:
                if($type == 0){
                    $recharges = static::find()->where(['game_id'=>$game_id])->asArray()->all();
                }elseif($type == 1){
                    $recharges = static::find()->where(['game_id'=>$game_id])->andWhere(['between','rec_time',strtotime('today'),strtotime('today')+86400])->asArray()->all();
                }elseif ($type == 2){
                    $begtime = date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")));
                    $endtime = date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+7,date("Y")));
                    $recharges = static::find()->where(['game_id'=>$game_id])->andWhere(['between','rec_time',strtotime($begtime),strtotime($endtime)+86400])->asArray()->all();
                }

                if(count($recharges) == 1){
                    return (int)$recharges[0]['money'];
                }elseif(count($recharges) > 1){
                    foreach ($recharges as $val){
                        $money += $val['money'];
                    }
                    return $money;
                }
                break;
            default:
                $str = date('Y',time());
                $begtime = strtotime($str.'-'.$month);
                $endtime = strtotime('+1 month',$begtime)-1;
                $recharges = static::find()->where(['game_id'=>$game_id])->andWhere(['between','rec_time',$begtime,$endtime])->asArray()->all();
                foreach ($recharges as $val){
                    $money += $val['money'];
                }
                return $money;
                break;
        }

    }

    /**
     * @param $game_id
     * @param $level
     * @param int $type 1 当日
     * @param int $month 指定月份
     * @param int $data
     * @return float|int 直属玩家给我带来的收益
     */
    public static function gameusers_profit($game_id,$level,$type=0,$month=0,$data = 0){
        switch ($month){
            case 0:
                if($type == 0){
                    $recharge = GameRecharge::find()->where(['game_id'=>$game_id])->asArray()->all();
                }elseif($type == 1){
                    $recharge = GameRecharge::find()->where(['game_id'=>$game_id])->andWhere(['between','rec_time',strtotime('today'),strtotime('today')+86400])->asArray()->all();
                }
                break;
            default:
                $str = date('Y',time());
                $begtime = strtotime($str.'-'.$month);
                $endtime = strtotime('+1 month',$begtime)-1;
                $recharge = static::find()->where(['game_id'=>$game_id])->andWhere(['between','rec_time',$begtime,$endtime])->asArray()->all();
                break;
        }

        $data = [];
        if(count($recharge) > 0){
            foreach ($recharge as $val){
                $data[] = $val['money'];
            }
            switch ($level){
                case 2:
                    return array_sum($data)*0.4;
                    break;
                case 1:
                    return array_sum($data)*0.5;
                case 0:
                    return array_sum($data)*0.6;
            }
        }else{
            return 0;
        }
    }
}
