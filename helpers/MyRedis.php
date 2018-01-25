<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/8/10
 * Time: 9:38
 */

namespace app\helpers;

use Yii;

class MyRedis
{

    public $hostname = '127.0.0.1';
    public $port = 6379;
    public $database = 0;
    public $redis = '';

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect($this->hostname, $this->port);
    }

    public function command($name,$params = []){
        return $this->redis->executeCommand($name,$params);
    }

    /**
     * key 是否存在
     * @param $key
     * @return bool
     */
    public function isExist($key){
        return $this->redis->exists($key);
    }

    /**
     * 删除key
     * @param  string | array $key
     * @return int|0	   删除的个数
     */
    public function del($key)
    {
        return $this->redis->del($key);
    }

    /**
     * 查找key
     * @param $key
     * @return array
     */
    public function keys($key)
    {
        return $this->redis->keys($key);
    }

    /**
     * 获取key类型
     * @param  string $key [description]
     * @return string      none | string | list | set | zset | hash
     */
    public function type($key)
    {
        return $this->redis->type($key);
    }

    /**
     *
     * @param string $key
     * @param string $value
     * @param int 	 $expire 过期时间，默认不过期
     * @return ok
     */
    /**
     * 设置key-value
     * @param $key
     * @param $value
     * @param string $expire 过期时间，默认不过期
     * @return bool
     */
    public function set($key, $value, $expire = '0')
    {
        if ($expire != '0') {
            return $this->redis->set($key,$value,$expire);
        }
        return $this->redis->set($key,$value);
    }

    /**
     * key-value格式
     * @param  string|array $key
     * @return string      [description]
     */
    public function get($key)
    {
        $func = is_array($key) ? 'mget' : 'get';
        return $this->redis->{$func}($key);
    }

    /**
     * 设置hash类型
     * @param  string $key
     * @param  array $data 存入的数据
     * @return ok
     */
    public function hSet($key, $data)
    {
        return $this->redis->hmset($key,$data);
    }

    /**
     * hash删除某字段
     * @param $key
     * @param $field
     * @return int
     */
    public function hDel($key, $field)
    {
        return $this->redis->hdel($key,$field);
    }

    /**
     * 获取hash
     * @param $key
     * @param $field
     * @return array|string
     */
    public function hGet($key, $field)
    {
        if (is_array($field)) {
            return $this->redis->hmget($key,$field);
        }else if ($field == 'all') {
            return $this->redis->hgetall($key);
        }
        return $this->redis->hget($key,$field);
    }

    /**
     * hash长度
     * @param  string $key [description]
     * @return int      [description]
     */
    public function hLen($key)
    {
        return $this->redis->llen($key);
    }

    /**
     * 设置list
     * @param $key
     * @param $data
     * @param string $left
     * @return int
     */
    public function lset($key, $data, $left='true')
    {
        if ($left) {
            return $this->redis->lpush($key, $data);
        } else {
            return $this->redis->rpush($key, $data);
        }
    }

    /**
     * 获取list内容
     * @param  string $key   [description]
     * @param  int $start    开始index
     * @param  int $end    	 结束index
     * @return array        [description]
     */
    public function lGet($key, $start, $end)
    {
        return $this->redis->lrange($key, $start, $end);
    }

    /**
     * 删除左一或者右一
     * @param $key
     * @param string $left
     * @return string
     */
    public function lDel($key, $left = 'true')
    {
        if ($left) {
            return $this->redis->lpop($key);
        } else {
            return $this->redis->rpop($key);
        }
    }

    /**
     * 删除多个value
     * @param $key
     * @param $value
     * @param $count
     * @return int
     */
    public function lmDel($key, $value, $count)
    {
        return $this->redis->lrem($key, $value, $count);
    }

    /**
     * 获取list长度
     * @param  string $key [description]
     * @return int      [description]
     */
    public function lLen($key)
    {
        return $this->redis->llen($key);
    }

    /**
     * 管道
     * @return mixed
     */
    public function pipeline()
    {
        return $this->redis->pipeline();
    }

    /**
     * 设置集合
     * @param $key
     * @param $value
     * @return int
     */
    public function sSet($key, $value)
    {
        if (is_array($value)) {
            $pipe = $this->redis->pipeline();
            foreach ($value as $k => $v) {
                $pipe->sadd($key, $v);
            }
            return $pipe->exec();
        } else {
            return $this->redis->sadd($key, $value);
        }
    }

    /**
     * 返回集合长度
     * @param $key
     * @return int
     */
    public function sLen($key)
    {
        return $this->redis->scard($key);
    }

    /**
     * 获取set值
     * @param  string $key   [description]
     * @param  all | int $count all:返回所有值,count:随机弹出count个值
     * @return null | string | array        [description]
     */
    public function sGet($key, $count)
    {
        if ($count == 'all') {
            return $this->redis->smembers($key);
        } else {
            $pipe = $this->redis->pipeline();
            for ($i=0; $i < $count; $i++) {
                $pipe->spop($key);
            }

            $data = $pipe->exec();
            return $data;
        }
    }

    /**
     * 移除set里边的一个值
     * @param  string $key   [description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function sDel($key, $value)
    {
        if (is_array($value)) {
            $pipe = $this->redis->pipeline();
            foreach ($value as $key => $value) {
                $pipe->srem($key, $value);
            }
            return $pipe->exec();
        } else {
            $this->redis->srem($key, $value);
        }
    }

    /**
     * 设置key过期时间
     * @param $key
     * @param $expire
     * @return bool
     */
    public function expire($key, $expire)
    {
        return $this->redis->expire($key, $expire);
    }

    /**
     * 递增key的整数值
     * @param $key
     * @return int
     */
    public function incr($key)
    {
        return $this->redis->incr($key);
    }

    /**
     * Incrby 命令将 key 中储存的数字加上指定的增量值
     * @param $key
     * @param $value
     * @return int
     */
    public function incrBy($key, $value)
    {
        return $this->redis->incrBy($key, $value);
    }

    /**
     * 递减key的整数值
     * @param $key
     * @return int
     */
    public function decr($key)
    {
        return $this->redis->decr($key);
    }

    /**
     * 判断剩余时间
     * @param $key
     * @return int
     */
    public function ttl($key)
    {
        return $this->redis->ttl($key);
    }

}