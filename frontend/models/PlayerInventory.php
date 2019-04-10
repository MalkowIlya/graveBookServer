<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "player_inventory".
 *
 * @property int $id
 * @property int $id_player
 * @property string $fences
 * @property string $coffins
 * @property string $monument
 * @property string $shovel
 * @property string $repair_monument
 * @property string $broke_monument
 * @property string $repair_fences
 * @property string $broke_fences
 * @property string $suck
 */
class PlayerInventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player_inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_player'], 'integer'],
            [['fences', 'coffins', 'monument', 'shovel', 'repair_monument', 'broke_monument', 'repair_fences', 'broke_fences', 'suck'], 'required'],
            [['fences', 'coffins', 'monument', 'shovel', 'repair_monument', 'broke_monument', 'repair_fences', 'broke_fences', 'suck'], 'string', 'max' => 255],
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
            'fences' => 'Fences',
            'coffins' => 'Coffins',
            'monument' => 'Monument',
            'shovel' => 'Shovel',
            'repair_monument' => 'Repair Monument',
            'broke_monument' => 'Broke Monument',
            'repair_fences' => 'Repair Fences',
            'broke_fences' => 'Broke Fences',
            'suck' => 'Suck',
        ];
    }
}
