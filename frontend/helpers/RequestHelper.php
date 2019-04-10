<?php

namespace frontend\helpers;

use Yii;

class RequestHelper
{
    public static function requestHandler()
    {
        $request=Yii::$app->getRequest()->getBodyParams();
        if (!empty($request)) {
            $data = array();
            foreach ($request as $name => $value) {
                $data[$name] = $value;
            };
            return $request;
        } else {
            return null;
        }

    }

    public static function requestGetParams()
    {
        $params = \Yii::$app->request->get();
        return $params;
    }

//    public static function
}