<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/8/15
 * Time: 9:48
 */

namespace app\helpers;

class Game
{
    private $_soap;

    public function __construct()
    {
        $this->_soap = new \SoapClient(null,array(
            "location"  => "http://120.76.157.208/hongzhong2/webapi/server.php",
            "uri"       => "hzmjserver",  //资源描述符服务器和客户端必须对应
            'login'     => 'hzmj', // HTTP auth login
            'password'  => 'WeiXinQun@#807' // HTTP auth password
        ));
    }

    public function checkUser($gameId)
    {
        $result = $this->_soap->checkUser($gameId);
        return $result;
    }

    public function bindQuid($userId, $code)
    {
        $result = $this->_soap->bindQuid($userId, $code);
        return $result;
    }

    public function addCard($user_id, $card_num)
    {
        $result = $this->_soap->addCard($user_id, $card_num, 1);
        return $result;
    }

    public function getUserInfo($gameUserId)
    {
        $result = $this->_soap->getUserInfo($gameUserId);
        return $result;
    }

    public function getUserList($quid, $page, $perpage, $sort = '', $order = '', $date = '', $gameUesrId = '')
    {
        file_put_contents('sql.log', print_r($quid, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($page, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($perpage, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($sort, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($order, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($date, true).PHP_EOL,FILE_APPEND);
        file_put_contents('sql.log', print_r($gameUesrId, true).PHP_EOL,FILE_APPEND);
        $result = $this->_soap->getUserList($quid, $page, $perpage, $sort, $order, $date, $gameUesrId);

        return $result;
    }
}