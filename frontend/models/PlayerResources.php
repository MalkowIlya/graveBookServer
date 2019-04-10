<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "player_resources".
 *
 * @property int $id
 * @property int $id_player
 * @property int $skull
 * @property int $gold_skull
 * @property int $vodka
 * @property int $marry
 * @property int $lemon
 * @property int $dynamite
 * @property int $energy
 * @property int $time
 * @property int $points
 * @property int $level
 * @property int $clan_id
 * @property int $safe_skull
 * @property int $safe_vodka
 * @property string $friends
 * @property int $location
 * @property int $place
 */
class PlayerResources extends \yii\db\ActiveRecord
{
    public function fields()
    {
        return [
            'skull',
            'gold_skull',
            'vodka',
            'marry',
            'lemon',
            'dynamite',
            'energy',
            'time',
            'points',
            'level',
            'clan_id',
            'safe_skull',
            'safe_vodka',
            'friends',
            'location',
            'place',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player_resources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_player', 'skull', 'gold_skull', 'vodka', 'marry', 'lemon', 'dynamite', 'energy', 'time', 'points', 'level', 'clan_id', 'safe_skull', 'safe_vodka', 'location', 'place'], 'integer'],
            [['skull', 'gold_skull', 'vodka', 'marry', 'lemon', 'dynamite', 'energy', 'time', 'points', 'level', 'clan_id', 'safe_skull', 'safe_vodka', 'location', 'place'], 'required'],
            [['friends'], 'string', 'max' => 255],
            [['id_player'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_player' => 'Id Player',
            'skull' => 'Skull',
            'gold_skull' => 'Gold Skull',
            'vodka' => 'Vodka',
            'marry' => 'Marry',
            'lemon' => 'Lemon',
            'dynamite' => 'Dynamite',
            'energy' => 'Energy',
            'time' => 'Time',
            'points' => 'Points',
            'level' => 'Level',
            'clan_id' => 'Clan ID',
            'safe_skull' => 'Safe Skull',
            'safe_vodka' => 'Safe Vodka',
            'friends' => 'Friends',
            'location' => 'Location',
            'place' => 'Place',
        ];
    }
}
