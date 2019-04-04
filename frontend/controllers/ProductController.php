<?php

namespace frontend\controllers;

use frontend\models\rest\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;


class ProductController extends BaseApiController
{
    public $modelClass = 'frontend\models\rest\Product';


    public function actionColors(){
        return ArrayHelper::map(Product::find()->select('color')->groupBy('color')->all(),'color','color');
    }

    public function actionPrice($id)
    {
        $product = Product::find()
            ->where(['id' => $id])
            ->one();
        return $product;
    }


    public function actionIndex() {
        return new ActiveDataProvider([
            'query' => Product::find()->select('color')->groupBy('color')->all()
        ]);
    }
}