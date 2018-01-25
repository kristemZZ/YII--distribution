<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 12:59
 */
namespace app\components;
use app\models\Image;
use yii\base\NotSupportedException;
use yii\web\Cookie;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\IdentityInterface;

/**
 *
 * @property \app\models\User|\yii\web\IdentityInterface|null $identity The identity object associated with the currently logged-in
 * user. `null` is returned if the user is not logged in (not authenticated).
 * @property string $nickname
 * @property string $accessToken
 * @property string $avatar
 * Class User
 * @package app\components
 */
class User extends \yii\web\User
{
    public $loginUrl = ['passport/login'];

    public $returnUrlGetParam = 'forward';

    public $autoRenewCookie = true;

    public $tokenName = '_utoken';

    public function init()
    {
        parent::init();

        $this->on(static::EVENT_BEFORE_LOGIN, [$this, 'doBeforeLoginThing']);
    }

    public function login(IdentityInterface $identity, $duration = 0)
    {
        if ($this->beforeLogin($identity, false, $duration)) {
            $this->switchIdentity($identity, $duration);
            $this->afterLogin($identity, false, $duration);
        }

        return !$this->getIsGuest();
    }

    public function getNickname()
    {
        if ($this->identity) {
            if ($this->identity->nickname) {
                $nickname = $this->identity->nickname;
            }elseif ($this->identity->phone) {
                $nickname = $this->identity->phone;
            } elseif ($this->identity->email) {
                $nickname = $this->identity->email;
            }
            return $nickname;
        }
        return '';
    }

    public function getAvatar($width = 160)
    {
        return Image::getUserFaceUrl($this->identity->avatar, $width);
    }

    public function getAccessToken()
    {
        if ($this->identity) {
            $token = $this->identity->getAccessToken();
        } else {
            $cookies = \Yii::$app->request->cookies;
            if ($token = $cookies->getValue($this->tokenName)) {
                return $token;
            }
            $token = \app\models\User::createToken();
        }
        $cookies = \Yii::$app->response->cookies;
        $expire = time() + $this->tokenExpire;
        $cookies->add(new Cookie([
            'name' => $this->tokenName,
            'value' => $token,
            'domain' => '.' . DOMAIN,
            'expire' => $expire,
        ]));
        return $token;
    }

    public function getTokenExpire()
    {
        return 1800;
    }

    public function doBeforeLoginThing($event)
    {
        $user = $event->identity;
        $user->generateToken();
        $user->last_login_ip = ip2long(Yii::$app->request->userIP);
        $user->updated_at = time();
        $user->save();
    }

    public function getReturnUrl($defaultUrl = null)
    {
        $url = Yii::$app->getRequest()->get($this->returnUrlGetParam, $defaultUrl);
        if (is_array($url)) {
            if (isset($url[0])) {
                return Yii::$app->getUrlManager()->createUrl($url);
            } else {
                $url = null;
            }
        }

        return $url === null ? Yii::$app->getHomeUrl() : $url;
    }

    public function setReturnUrl($url)
    {
        throw new NotSupportedException('不支持的方法');
    }

    public function loginRequired($checkAjax = true, $checkAcceptHeader = true)
    {
        $request = Yii::$app->getRequest();
        if (!$checkAjax || !$request->getIsAjax()) {
            $forword = $request->getAbsoluteUrl();
        } else {
            $forword = '';
        }
        if ($this->loginUrl !== null) {
            $loginUrl = (array) $this->loginUrl;
            if ($loginUrl[0] !== Yii::$app->requestedRoute) {
                $returnUrlGetParam = $this->returnUrlGetParam;
                $loginUrl = $forword ? array_merge($loginUrl, [$returnUrlGetParam=>$forword]) : $this->loginUrl;
                return Yii::$app->getResponse()->redirect($loginUrl);
            }
        }
        throw new ForbiddenHttpException(Yii::t('yii', 'Login Required'));
    }

    protected function renewAuthStatus()
    {
        $cookies = Yii::$app->request->cookies;
        $token = $cookies->getValue('_utoken');

        if ($token === null) {
            $identity = null;
        } else {
            /* @var $class IdentityInterface */
            $class = $this->identityClass;
            //if (Brower::isMcroMessager()) {
            //    $identity = $class::findIdentityByAccessToken($token,1);
            //} else {
                $identity = $class::findIdentityByAccessToken($token);
            //}
            if ($identity && $this->autoRenewCookie) {
                $this->sendIdentityCookie($identity, $this->tokenExpire);
            }
        }

        $this->setIdentity($identity);

        if (!$identity) {
            $this->logout(true);
        }
    }



    public function loginByAccessToken($token, $type = null)
    {
        /* @var $class IdentityInterface */
        $class = $this->identityClass;
        $identity = $class::findIdentityByAccessToken($token, $type);
        if ($identity && $this->login($identity, $this->tokenExpire)) {
            return $identity;
        } else {
            return null;
        }
    }

    public function logout($destroyCookie = true)
    {
        $identity = $this->getIdentity();
        if ($identity !== null && $this->beforeLogout($identity)) {
            $this->switchIdentity(null);
            if ($destroyCookie) {
                $cookies = Yii::$app->getResponse()->cookies;
                $cookies->add(new Cookie([
                    'name' => $this->tokenName,
                    'value' => '',
                    'domain' => '.' . DOMAIN,
                ]));
            }
            $this->afterLogout($identity);
        }

        return $this->getIsGuest();
    }

    public function switchIdentity($identity, $duration = 0)
    {
        $this->setIdentity($identity);

        if ($identity) {
            $this->sendIdentityCookie($identity, $duration);
        }
    }

    protected function sendIdentityCookie($identity, $duration)
    {
        $cookies = \Yii::$app->response->cookies;
        $expire = time() + $duration;
        $token = $identity->getAccessToken();
        $cookies->add(new Cookie([
            'name' => $this->tokenName,
            'value' => $token,
            'domain' => '.' . DOMAIN,
            'expire' => $expire
        ]));
    }


    public function getIsGuest()
    {
        return $this->getIdentity() === null;
    }


    public function getId()
    {
        $identity = $this->getIdentity();

        return $identity !== null ? $identity->getId() : null;
    }
}