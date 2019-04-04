<?php


namespace frontend\controllers;

use phpDocumentor\Reflection\Types\Object_;
use Yii;
use frontend\models\rest\Auth;


class AuthController extends BaseApiController
{
    public $modelClass = 'frontend\models\rest\Auth';

    public function actionGet_user_by_auth_id($auth_id)
    {
        $user = Auth::find()
            ->where(['auth_id' => $auth_id])
            ->one();
        return $user;
    }

    public function actionCreate_user()
    {
        $request=Yii::$app->getRequest()->getBodyParams();
//        $myData=(object)$request->bodyParams['myData'];

        if(!empty($request)) {
            $data = array();
            foreach ($request as $name => $value){
                $data[$name] = $value;
            }

            $findUser = Auth::find()
                ->where(['auth_id' => $data["auth_id"]])
                ->one();

            if (empty($findUser)) {
                return 'Пошел вон бот голимый';
            } else {
                $data = Array(
                    "answer" => "Добро пожаловать хуйлопан",
                    "comeData" => $data,
                );
                return $this->asJson($data);
            }

        } else {
            $data_error ["error_message"] = "Передай чонить але бля";
            $error = json_encode($data_error);
            return $error;
        }




//        return 'Пошел вон бот голимый';
//        return $this->asJson($auth_id);
//        $user = Auth::find()
//            ->where(['id' => 2])
//            ->one();
//        return $user;
    }
}