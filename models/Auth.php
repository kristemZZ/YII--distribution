<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auth_copy".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $my_token
 * @property integer $auth_time
 * @property string $nickname
 * @property integer $parent_id
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'auth_time', 'parent_id'], 'integer'],
            [['my_token', 'nickname'], 'string', 'max' => 255],
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
            'my_token' => '授权码',
            'auth_time' => '授权时间',
            'nickname' => '昵称',
            'parent_id' => '上级代理id',
        ];
    }
}
