<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 16/7/5
 * Time: 下午9:30
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    public $userId;

    public function init()
    {
        parent::init();
        $user = Yii::$app->user;
        if ($user->isGuest) {
            $user->loginRequired();
            Yii::$app->end();
        }
        $this->userId = $user->id;
    }
}