<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\models\User;

class UserController extends ActiveController
{
    public function actionView() {
        return User::findOne(1);
    }
    public $modelClass = 'frontend\models\User';
}