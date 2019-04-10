<?php

namespace frontend\controllers;

use frontend\models\rest\Product;
use Yii;
use frontend\helpers\RequestHelper;
use frontend\helpers\StartingData;
use yii\rest\ActiveController;
use frontend\models\User;
use yii\db\Exception;

class UserController extends ActiveController
{
    public $modelClass = 'frontend\models\User';

    public function checkAccess($action, $model=null, $params=[]) {
        return true;
    }
//    public function behaviors() {
//        $behaviors = parent::behaviors();
//        $behaviors['access'] = [
//            'class' => AccessControl::className(),
//            'rules' => [
//                [
//                    'allow' => true,
//                    'roles' => ['@']
//                ],
//            ],
//        ];
//        return $behaviors;
//    }

    public function actionRegister()
    {
        $request = RequestHelper::requestHandler();

        if (isset($request['user_name'])) {
            $current_time = time();
            $md5 = md5($request['user_name'].(string)$current_time);


            try {
                $user = new User();
                $user->username = $request['user_name'];
                $user->auth_key = $md5;
                $user->created_at = $current_time;
                $user->user_img = $request['img'];
                $user->save();
                $answer['user'] = User::find()->where(['auth_key' => $md5])->one();
                StartingData::createStartData($answer['user']['id'], $current_time);
                return ($answer);
            } catch (\Exception $exception) {
                return $exception;
            }

        } else {
            $error ["error"] = "Name or img not found";
            return $error;
        }
    }

    public function actionConnectsoc()
    {
        $request = RequestHelper::requestHandler();

        if(isset($request['auth_key']) && isset($request['auth_id']) && $request['auth_id'] !== "" && $request['auth_key'] !== "")
        {
            $user = User::find()->where(['auth_key' => $request['auth_key']])->one();
            if($user === null) {
                $error ["error"] = "Not correct auth_key";
                return $error;
            } else {
                if($auth_id = $user->auth_id == "")
                {
                    $user->auth_id = $request['auth_id'];
                    $user->save();
                    return $user;
                } else {
                    $error ["error"] = "This user already connect";
                    return $error;
                }
            }
        } else {
            $error ["error"] = "Something is missing";
            return $error;
        }
    }

    public function actionAuth()
    {
        $request = RequestHelper::requestHandler();

        if(isset($request['auth_key']) && isset($request['auth_id']) && $request['auth_id'] !== "" && $request['auth_key'] !== "") {
            $user = User::find()->where(['auth_id' => $request['auth_id']])->one();
            $user_token = $user->auth_key;

            if($request['auth_key'] == $user_token) {
                return $user;
            } else {
                $error ["error"] = "Auth token or UserId no valid";
                return $error;
            }

        } elseif (isset($request['auth_id']) && $request['auth_id'] !== "") {
            $user = User::find()->where(['auth_id' => $request['auth_id']])->one();
            if($user !== null) {
                $username = $user->username;
                $current_time = time();
                $md5 = md5($username.(string)$current_time);

                $user->auth_key = $md5;
                $user->updated_at = $current_time;
                $user->save();
                return $user;
            }
        } else {
            $error ["error"] = "AuthID is missing";
            return $error;
        }

        $error ["error"] = "Something is missing";
        return $error;
    }


//    public function actionWatcher($id)
//    {
//        return User::find()->where(['id' => $id])->one();
//    }


}