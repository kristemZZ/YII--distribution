<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_cards".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $id_card
 * @property string $card_num
 * @property string $name
 * @property string $bank_name
 * @property string $branch_name
 */
class UserCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id'], 'required'],
            [['game_id'], 'integer'],
            [['id_card', 'card_num', 'bank_name', 'branch_name'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => '玩家游戏id',
            'id_card' => 'Id Card',
            'card_num' => '卡号',
            'name' => '真实姓名',
            'bank_name' => '银行名称',
            'branch_name' => '支行名称',
        ];
    }
}
