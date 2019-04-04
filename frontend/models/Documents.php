<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;


class Documents extends ActiveRecord
{

    public static function tableName()
    {
        return 'documents';
    }

    public function fields()
    {
        return [
          'name',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

}
