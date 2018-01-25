<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 15:08
 */

namespace app\controllers;

use app\models\Auth;
use app\models\GameUsers;
use app\models\UserCards;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;
use yii\helpers\Url;
use app\models\GameRecharge;
use app\models\User;
use yii\web\Response;

class DefaultController extends Controller
{
    /**
     * @param \yii\base\Action $action
     * @return bool|\yii\web\Response
     *  没登陆跳转登录页面
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $url = Url::to(['passport/login']);
            return $this->redirect($url);
        }
        return true;
    }

    public function actionIndex()
    {
//        Yii::$app->getUser()->logout();
//        $data = [];
        $userinfo = Yii::$app->user->identity;
//        echo '<pre>';var_dump($userinfo);exit;
        $game_id = $userinfo->game_id;
        $game_user = GameUsers::my_game_users($game_id); //下级玩家
        $auth_user = User::nex_auth($game_id); //下级代理
        $data['auth_num'] = $auth_user['num'];
        $data['game_user_num'] = $game_user['num'];
        $data['my_profit'] =  User::my_all_profit($game_id,$userinfo->level,1);  //我的收益
        $data['can_money'] = floor ($data['my_profit']/100)*100;
        $data["share"] = Url::to(['/invitation/index','p'=>$game_id]);
        return $this->render('index',$data);
    }

    public function actionMydata()
    {
        $data['user'] = Yii::$app->user->identity;
        $data['cardinfo'] = UserCards::findOne(['game_id'=>$data['user']['game_id']]);
        $requset = Yii::$app->request;
        if($requset->isAjax){
            $post = $requset->post();
            $province = $post['province'];
            $city = $post['city'];
            $birthday = strtotime($post['birthday']);
            $user = User::findOne(['id'=>$data['user']->id]);
            $user->city = $city;
            $user->province = $province;
            $user->birthday = $birthday?$birthday:'';
            $res = $user->save();
            if(!$res){
                $response = Yii::$app->response;
                $response->format = Response::FORMAT_JSON;
                return ['error' =>1 ,'msg'=>'修改失败'];
            }
        }
        return $this->render('mydata',$data);
    }
    public function actionAuth()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        if($request->isAjax){
            if(Yii::$app->user->identity->level == 2 or Yii::$app->user->identity->addproxy !=1  ){
                $response->format = Response::FORMAT_JSON;
                return ['error'=>1,'msg'=>'您没有授权权限'];
            }

            $post = $request->post();
            $idArr = array_filter(explode(',',$post['id']));
            if(!$post['id']){
                $response->format = Response::FORMAT_JSON;
                return ['error'=>1,'msg'=>'请选择授权对象'];
            }
            foreach ($idArr as $id){
                $game_user = GameUsers::find()->where(['id'=>$id])->one();
                $game_user->role = 2;  //授权为二级代理
                $res = $game_user->save();
                if($res){
                    $model = new Auth();

                    $model->game_id = $game_user->game_id;
                    $model->nickname = $game_user->nickname;
                    $model->auth_time = time();
                    $model->my_token = 'MZ'.crypt(time(),$game_user->game_id);   //生成邀请码
                    $model->parent_id = Yii::$app->user->identity->game_id;
                    $model->save();
                }else{
                    $response->format = Response::FORMAT_JSON;
                    return ['error'=>1,'msg'=>'授权失败'];
                }
            }
            $response->format = Response::FORMAT_JSON;
            return ['error'=>0,'msg'=>'授权成功'];
        }
        //查询我的玩家
        $data = [];
        $players = GameUsers::my_game_users(Yii::$app->user->identity->game_id);
        $data['players'] = $players['users'];
        if(count($data['players']) == 0){
            $data['players']  = 0;
        }
        return $this->render('auth',$data);
    }
    public function actionAuthrecord(){
        $userinfo = Yii::$app->user->identity;
        $data['info'] = Auth::find()->where(['game_id'=>$userinfo->game_id])->asArray()->all();
        return $this->render('authrecord',$data);
    }

    /**
     * @return string
     * 我的代理
     */
    public function actionMyagent(){
        $data = [];
        $userinfo = Yii::$app->user->identity;
        $auth_user = User::nex_auth($userinfo->game_id); //下级代理
        $today_user = User::nex_auth($userinfo->game_id,1);
        $data['today_num'] = $today_user['num'];
        $data['num'] = $auth_user['num'];
        $data['my_agent'] = $auth_user['users'];
        for($i = date('m');$i > 0 ;$i-- ){
            $data['month'][] = $i;
        }
        foreach ( $data['my_agent'] as $key=>$val ){
            $data['my_agent'][$key]['to_my_profit'] = User::to_my_profit($val,$userinfo->level);
            $data['my_agent'][$key]['own_all_profit'] = User::my_all_profit($val['game_id'],$val['level']);
            $data['my_agent'][$key]['url'] = Url::to(['/default/dlteam','id'=>$val[id]]);
        }
        return $this->render('myagent',$data);
    }

    /**
     * @return string 我的玩家
     */
    public function actionMyplayer(){
        $data = [];
        $userinfo = Yii::$app->user->identity;
        $game_users = GameUsers::my_game_users($userinfo->game_id);
        $today_game_users = GameUsers::my_game_users($userinfo->game_id,1);
//        echo '<pre>';var_dump($game_users);exit;
        $data['game_num'] = count($game_users['users']);
        $data['today_game_num'] = count($today_game_users['users']);
        $data['game_users'] = $game_users['users'];
        for ($i=date('m');$i>0;$i--){
            $data['month'][] = $i;
        }
        //玩家给我带来的收益
        if (count($data['game_users']) > 0){
            foreach ($data['game_users'] as $key=>$val){
                $data['game_users'][$key]['gameuser_profit'] = GameRecharge::gameusers_profit($val['game_id'],$userinfo->level);
            }
        }
        return $this->render('myplayer',$data);
    }
    public function actionMyprofit(){
        $user = Yii::$app->user->identity;
        $data = [];
        //今日
        $data['today_profit'] = User::my_all_profit($user->game_id,$user->level,1);
        $today = User::nex_auth($user->game_id);
        if(count($today['users']) > 0){
            foreach ($today['users'] as $key=>$val){
                //下级带给我的收益
                $today_profit = User::to_my_profit($val,$user->level,1);
                $week_profit = User::to_my_profit($val,$user->level,2);
                $all_profit = User::to_my_profit($val,$user->level);
                $today['users'][$key]['to_my_profit_today'] = $today_profit;
                $today['users'][$key]['to_my_profit_week'] = $week_profit;
                $today['users'][$key]['to_my_profit_all'] = $all_profit;
            }
            $data['today_info'] = $today['users'];
        }else{
            $data['today_info'] = 0;
        }
        for ($i = date('m');$i > 0;$i--){
            $data['month'][] = $i;
        }
        //本周
        $data['week_profit'] = User::my_all_profit($user->game_id,$user->level,2);

        //all
        $data['all_profit'] = User::my_all_profit($user->game_id,$user->level);

        return $this->render('myprofit',$data);
    }
    public function actionCash(){
        return $this->render('cash');
    }
    public function actionCashrecord(){
        return $this->render('csrecord');
    }
    public function actionDltoday(){
        $userinfo = Yii::$app->user->identity;
        if($userinfo->level == 2){
            $data['error'] = 1;
        }else{
            $data['today_auth'] = User::nex_auth($userinfo->game_id,1);
            if(count($data['today_auth']) == 0){
                $data['error'] = 1;
            }else{
                foreach ($data['today_auth']['users'] as $key=>$val){
                    $data['today_auth']['users'][$key]['profit'] = User::to_my_profit($val,$userinfo->level,1);
                }
            }
        }
        return $this->render('dltoday',$data);
    }
    public function actionDlteam(){
        $request = Yii::$app->request;
        $info = $request->get();
        //验证是否是我的下级代理
        $my_auth = User::nex_auth(Yii::$app->user->identity->game_id);
        $nex_auth_arr = [];
        foreach ($my_auth['users'] as $val){
            $nex_auth_arr[] = $val['id'];
        }
        if(!in_array($info['id'],$nex_auth_arr)){
            return $this->redirect(['/default/myagent']);
        }
        $data['user'] = User::find()->where(['id'=>$info['id']])->asArray()->one();
        $data['user']['m'] =  date('Y-m-d',$data['user']['created_at']);
        $data['user']['h'] = date('H:i:s',$data['user']['created_at']);
        $profit = User::to_my_profit($data['user'],Yii::$app->user->identity->level);
        $data['user']['profit'] = $profit;
        //下级代理
        $nex_auth = User::nex_auth($data['user']['game_id']);
        if(count($nex_auth['users']) > 0){
            $data['nex_auth'] = $nex_auth['users'];
            foreach ($data['nex_auth'] as $key=>$value){
                $res = User::my_own_profit($value['game_id'],$value['level']);
                $data['nex_auth'][$key]['to_my_profit'] = ($res['sum_money']?$res['sum_money']:0)*0.1;
                $data['nex_auth'][$key]['own_all_profit'] = User::my_all_profit($value['game_id'],$value['level']);
                $data['nex_auth'][$key]['url'] = Url::to(['/default/dlmessage','id'=>base64_encode($value['id'])]);
            }
        }else{
            $data['nex_auth'] = 0;
        }
        return $this->render('dlteam',$data);

    }


    /**
     * @return string
     * 下级团队详细信息
     */
    public function actionDlmessage(){
        $request = Yii::$app->request->get();
        $id = base64_decode($request['id']);
        $user = [];
        $user = User::find()->where(['id'=>$id])->asArray()->one();
        $gameinfo = GameUsers::findOne(['game_id'=>$user['game_id']]);
        $user['wechat'] =  $gameinfo->wechat;
        $nex_auth = User::nex_auth($user['game_id']);
        $user['nex_auth_num'] = $nex_auth['num'];
        $nex_player = GameUsers::my_game_users($user['game_id']);
        $user['nex_player_num'] = $nex_player['num'];
        //总收益
        $user['all_profit'] = User::my_all_profit($user['game_id'],$user['level']);
        return $this->render('dlmessage',$user);
    }

    public function actionModifypwd(){
        $clapi  = new \app\controllers\ChuanglanSmsApi();
        $userinfo = Yii::$app->user->identity;
        $phone = $userinfo->phone;
        $code = rand(1000,9999);
        if(!Yii::$app->session->isActive){
            Yii::$app->session->open();
        }
        $code = 1111;
//        $result = $clapi->sendSMS( $phone,"【蛮子游戏】您的验证码是：".$code."，有效期10分钟。切勿告知他人。快乐在手心，老友在身边");
        Yii::$app->session->set('login_sms_code',$code);
        Yii::$app->session->set('login_sms_time',time());
        $data['code'] = substr($phone,-4);
        $data['phone'] = $phone;
        return $this->render("modifypwd",$data);
    }
}