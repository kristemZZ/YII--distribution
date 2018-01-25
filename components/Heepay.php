<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/11
 * Time: 9:58
 */

namespace app\components;

use yii\base\Component;
use Yii;

class Heepay extends Component
{
    public $pay_url;
    public $pay_phone_url;
    public $query_url;
    public $agent_id;
    public $sign_key;
    public $version;
    public $pay_type;
    public $notify_url;
    public $return_url;
    public $game_notify_url;
    public $game_return_url;
    public $pay_code;

    public function init()
    {

    }

    /**
     * 汇付宝微信支付请求
     * @param $order_id 订单号
     * @param $total_fee 订单金额
     * @param $goods_name 商品名称
     * @param $goods_num 商品数量
     * @param int $is_phone 是否使用手机端微信支付
     * @param int $type 0 代理商购卡   1 游戏内购买房卡
     * @param int $is_frame 使用微信公众号支付
     * @param string $goods_note 商品说明
     * @param string $remark 商户自定义
     * @return mixed
     */
    public function request($order_id, $total_fee, $goods_name, $goods_num, $is_phone = 0, $type = 0, $is_frame = 0, $goods_note = '', $remark = '')
    {
        $data = array();
        $data['meta_option'] = iconv("GB2312","UTF-8//IGNORE",base64_encode(iconv("UTF-8","GB2312//IGNORE",'{"s":"WAP","n":"红中麻将","id":"http://fx.jinkagame.com"}')));
        $data['version'] = $this->version;
        $data['agent_id'] = $this->agent_id;
        $data['agent_bill_id'] = $order_id;
        $data['agent_bill_time'] = date('YmdHis', time());
        $data['pay_type'] = $this->pay_type;
        $data['pay_code'] = $this->pay_code;
        $data['pay_amt'] = $total_fee;
        if ($type == 0) {
            $data['notify_url'] = $this->notify_url;
            $data['return_url'] = $this->return_url;
        } elseif ($type == 1) {
            $data['notify_url'] = $this->game_notify_url;
            $data['return_url'] = $this->game_return_url;
        }

        $data['user_ip'] = Yii::$app->request->userIP;
        $data['goods_name'] = urlencode($goods_name);
        $data['goods_num'] = urlencode($goods_num);
        $data['goods_note'] = urlencode($goods_note);
        $data['remark'] = urlencode($remark);
        $data['is_phone'] = $is_phone;
        $data['is_frame'] = $is_frame;
        $data['sign'] = $this->_set_sign_request($data);
        file_put_contents("/home/wwwlogs/debug_h5.txt",print_r($data, true).PHP_EOL,FILE_APPEND);
        //$result = $this->_postCurl($data, $this->pay_url, true);
        $result = $this->_getCurl($data, $this->pay_url, true);
        file_put_contents("/home/wwwlogs/debug_h5.txt",print_r($result, true).PHP_EOL,FILE_APPEND);
        return $result;
    }

    public function paymobile($agent_bill_id, $pay_amt, $goods_name, $goods_num, $remark = '',$game_id ){
        //1. 跑得快 2. 麻将 3. 斗牛
        $metaConfig =[
            1=>'[{"s":"Android","n":"小吆跑得快","id":"com.app.xiaoyao.pdk"},{"s":"IOS","n":"小吆跑得快","id":"com.lp.xypdkuai"}]',
            2=>'[{"s":"Android","n":"小吆麻将","id":"com.app.hzlzg"},{"s":"IOS","n":"小吆麻将","id":"com.app.hzlzg.newt"}]',
            3=>'[{"s":"Android","n":"小吆斗牛","id":"com.app.niuniu.lp"},{"s":"IOS","n":"小吆斗牛","id":"com.applp.niuniulp"}]',
            4=>'[{"s":"Android","n":"小吆广东麻将","id":"com.xiaoyaomaj.lpguangz"},{"s":"IOS","n":"小吆广东麻将","id":"com.xiaoyaomaj.lpguangz"}]',
            5=>'[{"s":"Android","n":"小吆牛十别","id":"com.xynsb.lpnsb25"},{"s":"IOS","n":"小吆牛十别","id":"com.xynsb.lpnsb25"}]',
            6=>'[{"s":"Android","n":"小吆捉麻子","id":"com.xyzhuolaomazi.pg1125"},{"s":"IOS","n":"小吆捉麻子","id":"com.01xyzhuolaomazi.pg1125"}]',
            8=>'[{"s":"Android","n":"小吆陕西麻将","id":"com.xyshanxi.lpmj25.sx01"},{"s":"IOS","n":"小吆陕西麻将","id":"com.xyshanxi.lpmj25.sx01"}]',
            9=>'[{"s":"Android","n":"小吆萧山麻将","id":"com.xyzjmj.xsmj.x1719"},{"s":"IOS","n":"小吆萧山麻将","id":"com.xyzjmj.xsmj.x1719"}]',
            13=>'[{"s":"Android","n":"小吆赛场","id":"com.tencent.tmgp.xyhnqpg0316"},{"s":"IOS","n":"小吆赛场","id":"com.iosxy.xyhnqp0316"}]',
            19=>'[{"s":"Android","n":"小吆贵州棋牌","id":"com.tencent.tmgp.xygzqpg0328"},{"s":"IOS","n":"小吆贵州棋牌","id":"com.tencent.tmgp.xygzqpg0328"}]',
        ];
        $data = array();
        //此参数格式固定，写确保参数完整性，如没有对应应用系统的app可以为空，但是格式不变。
        //注意：此参数需要gb2312编码下base64,然后utf-8编码下UrlEncode (copy 文档 新增参数 否则到2016-11-27付款会失败  尼玛搞得这么复杂)

        $data['meta_option'] = iconv("GB2312","UTF-8//IGNORE",base64_encode(iconv("UTF-8","GB2312//IGNORE",$metaConfig[$game_id])));
        $data['version'] = $this->version;
        $data['agent_id'] = $this->agent_id;
        $data['agent_bill_id'] = $agent_bill_id;
        $data['agent_bill_time'] = date('YmdHis', time());
        $data['pay_type'] = $this->pay_type;
        $data['pay_amt'] = $pay_amt;
        $data['notify_url'] = $this->game_notify_url;
        $data['return_url'] = $this->game_return_url;
        $data['user_ip'] = Yii::$app->request->userIP;
        $data['goods_name'] = urlencode($goods_name);
        $data['goods_num'] = urlencode($goods_num);
        $data['remark'] = urlencode($remark);
        $data['sign'] = $this->_set_sign_paymobile($data);
        file_put_contents("/home/wwwlogs/debug.txt",print_r($data, true).PHP_EOL,FILE_APPEND);
        $result = $this->_postCurl($data, $this->pay_phone_url);
        file_put_contents("/home/wwwlogs/debug.txt",print_r($result, true).PHP_EOL,FILE_APPEND);
        return $result;
    }

    public function agentid(){
        return $this->agent_id;
    }

    public function response($data)
    {
        return $this->_set_sign_response($data);
    }

    public function orderQuery($agent_bill_id, $agent_bill_time)
    {
        $data['version'] = $this->version;
        $data['agent_id'] = $this->agent_id;
        $data['agent_bill_id'] = $agent_bill_id;
        $data['agent_bill_time'] = $agent_bill_time;
        $data['remark'] = '';
        $data['return_mode'] = 1;
        $data['sign'] = $this->_set_sign_query($data);

        $str = $this->_postCurl($data, $this->query_url);
        $result = array();
        if ($str) {
            $strArray = explode('|', $str);
            foreach($strArray as $one) {
                $tmp = explode('=', $one);
                $result[$tmp[0]] = $tmp[1];
            }
        }
        return $result;
    }

    //新版Phone/SDK/PayInit.aspx接口加密认证方式，和_set_sign_request差了个return_url
    //heepay验证签名写死了顺序 真TM蠢
    private function _set_sign_paymobile($data)
    {
        $sign_str = '';
        $sign_str .= 'version=' . $data['version'];
        $sign_str .= '&agent_id=' . $data['agent_id'];
        $sign_str .= '&agent_bill_id=' . $data['agent_bill_id'];
        $sign_str .= '&agent_bill_time=' . $data['agent_bill_time'];
        $sign_str .= '&pay_type=' . $data['pay_type'];
        $sign_str .= '&pay_amt=' . $data['pay_amt'];
        $sign_str .= '&notify_url=' . $data['notify_url'];
        $sign_str .= '&user_ip=' . $data['user_ip'];
        $sign_str .= '&key=' . $this->sign_key;
        $sign = md5($sign_str); //签名值
        return $sign;
    }

    private function _set_sign_request($data)
    {
        $sign_str = '';
        $sign_str .= 'version=' . $data['version'];
        $sign_str .= '&agent_id=' . $data['agent_id'];
        $sign_str .= '&agent_bill_id=' . $data['agent_bill_id'];
        $sign_str .= '&agent_bill_time=' . $data['agent_bill_time'];
        $sign_str .= '&pay_type=' . $data['pay_type'];
        $sign_str .= '&pay_amt=' . $data['pay_amt'];
        $sign_str .= '&notify_url=' . $data['notify_url'];
        $sign_str .= '&return_url=' . $data['return_url'];
        $sign_str .= '&user_ip=' . $data['user_ip'];
        $sign_str .= '&key=' . $this->sign_key;

        $sign = md5($sign_str); //签名值

        return $sign;
    }

    private function _set_sign_response($data)
    {
        $sign_str = '';
        $sign_str .= 'result=' . $data['result'];
        $sign_str .= '&agent_id=' . $data['agent_id'];
        $sign_str .= '&jnet_bill_no=' . $data['jnet_bill_no'];
        $sign_str .= '&agent_bill_id=' . $data['agent_bill_id'];
        $sign_str .= '&pay_type=' . $data['pay_type'];
        $sign_str .= '&pay_amt=' . $data['pay_amt'];
        $sign_str .= '&remark=' . $data['remark'];
        $sign_str .= '&key=' . $this->sign_key;

        $sign = md5($sign_str); //签名值
        if ($sign == $data['sign']) {   //比较签名密钥结果是否一致，一致则保证了数据的一致性
            return true;
            //商户自行处理自己的业务逻辑
        } else {
            return false;
            //商户自行处理，可通过查询接口更新订单状态，也可以通过商户后台自行补发通知，或者反馈运营人工补发
        }
    }

    private function _set_sign_query($data)
    {
        $sign_str = '';
        $sign_str .= 'version=' . $data['version'];
        $sign_str .= '&agent_id=' . $data['agent_id'];
        $sign_str .= '&agent_bill_id=' . $data['agent_bill_id'];
        $sign_str .= '&agent_bill_time=' . $data['agent_bill_time'];
        $sign_str .= '&return_mode=' . $data['return_mode'];
        $sign_str .= '&key=' . $this->sign_key;

        $sign = md5($sign_str); //签名值
        return $sign;
    }

    private function _postCurl($data, $url, $info = false, $second = 30)
    {
        $ch = curl_init(); // 启动一个CURL会话
        curl_setopt($ch, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($ch, CURLOPT_TIMEOUT, $second); // 设置超时限制防止死循环
        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//文件流输出
        $data = curl_exec($ch);
        if ($data) {
            if ($info) {
                $info = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                curl_close($ch);
                return $info;
            } else {
                curl_close($ch);
                return $data;
            }
        } else {
            curl_close($ch);
            return $data;
        }
    }

    private function _getCurl($data, $url)
    {
        $d = http_build_query($data);
        return $url."?".$d;
        file_put_contents("/home/wwwlogs/debug_h5.txt",print_r($url."?".$d, true).PHP_EOL,FILE_APPEND);
        $res = file_get_contents($url."?".$d);
        file_put_contents("/home/wwwlogs/debug_h5.txt",print_r($res, true).PHP_EOL,FILE_APPEND);
        return $res;
    }
}