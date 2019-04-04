<?php

namespace frontend\models\rest;

use Yii;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Order extends \common\models\forRest\Order implements Linkable
{
    public function fields()
    {
        return parent::fields();
    }

    public function extraFields()
    {
        return [
            'order'
        ];
    }

    public function getLinks()
    {
        return [
            'vasia' => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }
}
