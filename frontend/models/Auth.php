<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auth".
 *
 * @property int $id
 * @property string $auth_id
 * @property string $nickname
 * @property int $timestamp
 * @property string $local_token
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_id', 'nickname', 'timestamp', 'local_token'], 'required'],
            [['timestamp'], 'integer'],
            [['auth_id', 'nickname', 'local_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_id' => 'Auth ID',
            'nickname' => 'Nickname',
            'timestamp' => 'Timestamp',
            'local_token' => 'Local Token',
        ];
    }
}
