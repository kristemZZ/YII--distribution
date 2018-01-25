<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/8/2
 * Time: 17:23
 */

namespace app\helpers;

class Common
{
    public static function emoji_to_html($str) {
        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i',function($str){
            return '\\';
        },$text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
//        return preg_replace('#\\\u([0-9a-f]+)#ie',"iconv('UCS-2','UTF-8', pack('H4', '\\1'))", $str);
    }

    public static function get_all_monday($year_month = '')
    {
        if (empty($year_month)) {
            $year_month = date("Ym");
        } else {
            $year_month = date('Ym', strtotime($year_month));
        }
        $maxDay  = date('t', strtotime($year_month . "01"));
        $mondays = array();
        for ($i = 1; $i <= $maxDay; $i++) {
            $date = $year_month . ($i>9 ? '' : '0') . $i;
            if (date('w', strtotime($date)) == 1) {
                if (strtotime('6 days', strtotime($date)) > strtotime(date('ymd'))) {
                    break;
                }
                $mondays[] = $date;
            }
        }
        return $mondays;
    }
    public static function setsign($request){
        $_salt = 'fx@#ca&hyxz';
        unset($request['sign']);
        ksort($request);
        $raw_sign = '';
        foreach($request as $k => $v){
            if($v){
                $raw_sign.=trim($k).trim($v);
            }
        }

        $raw_sign.=$_salt;//echo $raw_sign;die;
        return md5($raw_sign);

    }

    public static function getGameInfo($pid)
    {
//        $url = "https://igame.zhonghuaqueshen.com/user.php?pid=43992&created_at=1490152346&sign=Htyn7zgd9nuVQ";
//        $result= file_get_contents($url);
        $pid=trim($pid);
        $time=time();
        $web_key = "Htqtw{6=6YG#24xqy>P8#X";
        $sign = crypt("created_at$time"."pid$pid", $web_key);
        $url = "https://igame.zhonghuaqueshen.com/user.php?pid=".$pid."&created_at=".$time."&sign=".$sign;
        $result= file_get_contents($url);
        return $result;
    }
}