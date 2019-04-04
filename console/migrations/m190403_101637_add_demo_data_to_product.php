<?php

use yii\db\Migration;

/**
 * Class m190403_101637_add_demo_data_to_product
 */
class m190403_101637_add_demo_data_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rows = [];
        for($i = 0; $i < 100; $i++){
            $faker = \Faker\Factory::create('ru_RU');
            $rows[] = [
                $faker->unixTime('now'),
                'Product: ' . $faker->text(rand(50,100)),
                $faker->colorName,
                $faker->randomFloat(2,10,10000),
            ];
        }
        $this->batchInsert('product',[
            'created_at',
            'name',
            'color',
            'price'
        ],$rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('product');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_101637_add_demo_data_to_product cannot be reverted.\n";

        return false;
    }
    */
}
