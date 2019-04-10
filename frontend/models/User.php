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
 * @property string $auth_id
 * @property string $user_img
 */
class User extends \common\models\User
{
    public function fields()
    {
        return [
            'id',
            'username',
            'auth_key',
            'auth_id',
            'user_img',
        ];
    }

    public function time_created()
    {

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

    public function getData()
    {
        return $this->id . 'sadasdasdfff';
    }
}
