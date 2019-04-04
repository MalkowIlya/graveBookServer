<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_in_order}}`.
 */
class m190403_100731_create_product_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_in_order}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'price' => $this->decimal(10 ,2),
            'product_id' => $this->integer(),
            'order_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_in_order}}');
    }
}
