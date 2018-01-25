<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/11
 * Time: 10:02
 */

return [
    'class' => 'app\components\Heepay',
    'pay_url' => 'https://pay.Heepay.com/Payment/Index.aspx',
    'pay_phone_url' => 'https://pay.heepay.com/Phone/SDK/PayInit.aspx',
    'query_url' => 'https://query.heepay.com/Payment/Query.aspx',
    'agent_id' => '2072287',
    'sign_key' => 'EFADB2157F294C03B588C485',
    'version' => 1,
    'pay_type' => 30,
    'notify_url' => 'http://' . DOMAIN . '/heepay/notify',
    'return_url' => 'http://' . DOMAIN . '/heepay/result',
    'game_notify_url' => 'http://' . DOMAIN . '/heepay/game-notify',
    'game_return_url' => 'http://' . DOMAIN . '/heepay/game-result',
    'pay_code' => ''
];