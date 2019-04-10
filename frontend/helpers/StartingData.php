<?php

namespace frontend\helpers;

use Yii;
use frontend\models\PlayerResources;

class StartingData
{
    public static function createStartData($user_id, $current_time)
    {
        $resources = new PlayerResources();
        $resources->id_player = $user_id;
        $resources->skull = 10;
        $resources->gold_skull = 3;
        $resources->vodka = 3;
        $resources->marry = 0;
        $resources->lemon = 0;
        $resources->dynamite = 0;
        $resources->energy = 100;
        $resources->time = $current_time;
        $resources->points = 0;
        $resources->level = 0;
        $resources->clan_id = 0;
        $resources->safe_skull = 0;
        $resources->safe_vodka = 0;
        $resources->friends = null;
        $resources->location = 0;
        $resources->place = 0;
        $resources->save();
    }
}