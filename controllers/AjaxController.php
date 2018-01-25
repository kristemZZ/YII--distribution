<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/11
 * Time: 11:55
 */

namespace app\controllers;
use app\models\GameUsers;
use app\models\GameRecharge;
use app\models\User;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class AjaxController extends Controller
{
    public function beforeAction($action)
    {
        if(!Yii::$app->request->isPost){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['error'=>1,'msg'=>'非法访问'];
        }
        return true;
    }
    public function actionMyprofit(){
        $post = Yii::$app->request->post();
        $userinfo = Yii::$app->user->identity;
        $month = $post['month'];
        Yii::$app->response->format = Response::FORMAT_JSON;
        switch ($post['sign']){
            case 'auth':
                $month_profit = User::my_all_profit($userinfo->game_id,$userinfo->level,0,$month);
                $nex_auth = User::nex_auth($userinfo->game_id);
                if(count($nex_auth['users']) > 0){
                    foreach ($nex_auth['users'] as $key=>$val){
                        $to_me_profit = User::to_my_profit($val,$userinfo->level,0,$month);
                        $nex_auth['users'][$key]['all_profit'] = User::my_all_profit($val['game_id'],$val['level']);
                        $nex_auth['users'][$key]['to_me_profit'] = $to_me_profit;
                        $nex_auth['users'][$key]['url'] = Yii::$app->params['skinUrl'];
                        if($val['level'] == 2){
                            $nex_auth['users'][$key]['level_text'] = "二代";
                        }elseif($val['level'] == 1){
                            $nex_auth['users'][$key]['level_text'] = "一代";
                        }else{
                            $nex_auth['users'][$key]['level_text'] = "总代";
                        }
                    }
                    return ['profit'=>$month_profit,'user'=>$nex_auth['users']];
                }else{
                    return ['e'=>1];
                }
                break;
            default:
                $game_user = GameUsers::my_game_users($userinfo->game_id);

                if(count($game_user['users'])>0){
                    foreach ($game_user['users'] as $k=>$game){
                        $game_user['users'][$k]['to_me_profit'] = GameRecharge::gameusers_profit($game['game_id'],$userinfo->level,0,$month);
                        $game_user['users'][$k]['url'] = Yii::$app->params['skinUrl'];
                    }
                    return ['user'=>$game_user['users'],'e'=>0];
                }else{
                    return ['e'=>1];
                }

                break;
        }

    }

    public function actionSearchauth(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(!Yii::$app->request->isAjax){
            return ['error'=>1,'msg'=>'非法访问'];
        }
        $post = Yii::$app->request->post();
        $userinfo = Yii::$app->user->identity;
        switch ($post['sign']){
            case "auth":
                $auth = User::find()->where(['game_id'=>$post['game_id'],'tuijian_id'=>$userinfo->game_id])->asArray()->one();
                if(!$auth){
                    return ['error'=>1,'msg'=>'该代理不存在'];
                }
                $auth['url'] = Yii::$app->params['skinUrl'];
                $auth['all_profit'] = User::my_all_profit($auth['game_id'],$auth['level']);
                if($auth['level'] == 2){
                    $auth['text_level'] = '二代';
                }elseif($auth['level'] == 1){
                    $auth['text_level'] = '一代';
                }else{
                    $auth['text_level'] = '总代';
                }
                switch ($post['type']){
                    case '0m':
                        $auth['to_me_profit'] = User::to_my_profit($auth,$userinfo->level,1);

                        break;
                    case '1m':
                        $auth['to_me_profit'] = User::to_my_profit($auth,$userinfo->level,2);
                        break;
                    case '2m':
                        $auth['to_me_profit'] = User::to_my_profit($auth,$userinfo->level);
                        break;
                    default:
                        $auth['to_me_profit'] = User::to_my_profit($auth,$userinfo->level,0,$post['type']);
                        break;
                }
                return ['error'=>0,'user'=>$auth];
                break;
            default:
                $gameinfo = GameUsers::find()->where(['game_id'=>trim($post['game_id']),'parent_id'=>$userinfo->game_id])->asArray()->one();
                if(!$gameinfo){
                    return ['error'=>1,'msg'=>'该ID不存在'];
                }
                $gameinfo['url'] = Yii::$app->params['skinUrl'];
                switch ($post['type']){
                    case 'm':
                        $gameinfo['to_me_profit'] = GameRecharge::gameusers_profit($gameinfo['game_id'],$userinfo->level);
                        break;
                    default:
                        $gameinfo['to_me_profit'] = GameRecharge::gameusers_profit($gameinfo['game_id'],$userinfo->level,0,$post['type']);
                        break;
                }
                return ['sign'=>0,'user'=>$gameinfo];
                break;
        }
    }
    public function actionAuth(){
        $post = Yii::$app->request->post();
        $userinfo = Yii::$app->user->identity;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = trim($post['id']);
        $gameinfo = GameUsers::find()->where(['game_id'=>$id,'parent_id'=>$userinfo->game_id])->asArray()->one();
        if($gameinfo){
            $gameinfo['url'] = Yii::$app->params['skinUrl'];
            return ['error'=>0,'user'=>$gameinfo];
        }else{
            return ['error'=>1,'msg'=>'该ID不存在'];
        }
    }

}
