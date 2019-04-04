<?php

use yii\db\Migration;

/**
 * Class m190403_101354_add_demo_data_to_order
 */
class m190403_101354_add_demo_data_to_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rows = [];
        for($i = 0; $i < 200; $i++){
            $faker = \Faker\Factory::create();
            $rows[] = [
                $faker->unixTime('now'),
                $faker->firstName,
                $faker->lastName,
                $faker->address,
            ];
        }
        $this->batchInsert('order',[
            'created_at',
            'first_name',
            'last_name',
            'address'
        ],$rows);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('order');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_101354_add_demo_data_to_order cannot be reverted.\n";

        return false;
    }
    */
}
