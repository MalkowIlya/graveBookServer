<?php

namespace frontend\controllers\v2;

use frontend\controllers\BaseApiController;
use frontend\models\rest\Product;
use Yii;
use yii\helpers\ArrayHelper;

class ProductController extends BaseApiController
{
    public function actionColors(){
        return [12, 123, 44 ];
    }
    public function actionKek() {
        return Product::find()->select('color')->groupBy('color');
    }

    public function actionIndex() {
        return Product::find();
    }
    public $modelClass = 'frontend\models\rest\Product';

//    public function actions()
//    {
//        $actions = parent::actions();
//        unset($actions['delete']);
//        return $actions;
//        return parent::actions();
//    }


}