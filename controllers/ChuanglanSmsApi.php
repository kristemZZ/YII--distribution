<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
header("Content-type:text/html; charset=UTF-8");

class ChuanglanSmsApi extends Controller{


        //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

        //创蓝发送短信接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
        const API_SEND_URL = 'http://smssh1.253.com/msg/send/json';

        //创蓝变量短信接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
        const API_VARIABLE_URL = 'http://smssh1.253.com/msg/variable/json';

        //创蓝短信余额查询接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
        const API_BALANCE_QUERY_URL = 'http://smssh1.253.com/msg/balance/json';
        //创蓝账号 替换成你自己的账号
        const API_ACCOUNT = 'N7512516';

        //创蓝密码 替换成你自己的密码
        const API_PASSWORD = 'v5d9E3fcxb58cc';

        //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

    /**
     * 发送短信
     *
     * @param string $mobile 		手机号码
     * @param string $msg 			短信内容
     * @param string $needstatus 	是否需要状态报告
     */
    public function sendSMS( $mobile, $msg, $needstatus = 'true') {

        //创蓝接口参数
        $postArr = array (
            'account'  =>  self::API_ACCOUNT,
            'password' => self::API_PASSWORD,
            'msg' => urlencode($msg),
            'phone' => $mobile,
            'report' => $needstatus
        );

        $result = $this->curlPost( self::API_SEND_URL , $postArr);
        return $result;
    }

    /**
     * 发送变量短信
     *
     * @param string $msg 			短信内容
     * @param string $params 	最多不能超过1000个参数组
     */
    public function sendVariableSMS( $msg, $params) {
        global $chuanglan_config;

        //创蓝接口参数
        $postArr = array (
            'account' => self::API_ACCOUNT,
            'password' =>self::API_PASSWORD,
            'msg' => $msg,
            'params' => $params,
            'report' => 'true'
        );

        $result = $this->curlPost( self::API_VARIABLE_URL, $postArr);
        return $result;
    }


    /**
     * 查询额度
     *
     *  查询地址
     */
    public function queryBalance() {
        global $chuanglan_config;

        //查询参数
        $postArr = array (
            'account' => self::API_ACCOUNT,
            'password' => self::API_PASSWORD,
        );
        $result = $this->curlPost(self::API_BALANCE_QUERY_URL, $postArr);
        return $result;
    }

    /**
     * 通过CURL发送HTTP请求
     * @param string $url  //请求URL
     * @param array $postFields //请求参数
     * @return mixed
     */
    private function curlPost($url,$postFields){
        $postFields = json_encode($postFields);
        $ch = curl_init ();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8'
            )
        );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt( $ch, CURLOPT_TIMEOUT,1);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
        $ret = curl_exec ( $ch );
        if (false == $ret) {
            $result = curl_error(  $ch);
        } else {
            $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "请求状态 ". $rsp . " " . curl_error($ch);
            } else {
                $result = $ret;
            }
        }
        curl_close ( $ch );
        return $result;
    }


}
?>