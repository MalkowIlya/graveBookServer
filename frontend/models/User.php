<?php

namespace frontend\models;

use Yii;

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
class User extends \common\models\User
{
    public function fields()
    {
        return [
            'id',
            'username',
            'email',
            'mama',
            'is_rrr' => function($model) {
                return $model->id == 1 ? 'rrr': 'ddd';
            }
        ];
    }

    public function extraFields()
    {
        return [
            'documents'
        ];
    }

    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['user_id' => 'id']);
    }

    public function getMama()
    {
        return $this->id . 'fff';
    }
}
