<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\rest\OpenResources;
use frontend\models\PlayerResources;
use frontend\models\PlayerInventory;
use frontend\helpers\RequestHelper;


class GraveController extends BaseApiController
{
    public $modelClass = 'frontend\models\PlayerResources';

    public function actionGetGrave()
    {
        $id = (RequestHelper::requestGetParams())['id'];
        $token = $_GET['token'];
        $user = User::find()->where(['id' => $id])->one();
        $userAuthKey = ($user['auth_key']);

        if($userAuthKey == $token) {
            $player = PlayerResources::find()->where(['id_player' => $id])->one();
            $data['user'] = [
                "id" => $user['id'],
                "nickname" => $user['username'],
            ];
            $data['resources'] = [$player];

            return $data;
        } else {
            $player = OpenResources::find()->where(['id_player' => $id])->one();
            $data['user'] = [
                "id" => $user['id'],
                "nickname" => $user['username'],
            ];
            $data['resources'] = [$player];

            return $data;
        }
    }

    public function actionWatcher()
    {
        $token = $_GET['token'];
        return $token;
    }
}