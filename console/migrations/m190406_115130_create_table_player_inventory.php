<?php

use yii\db\Migration;

/**
 * Class m190406_115130_create_table_player_inventory
 */
class m190406_115130_create_table_player_inventory extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%player_inventory}}', [
            'id' => $this->primaryKey()->unique(),
            'id_player' => $this->integer()->unique(),
            'fences' => $this->string()->notNull(),
            'coffins' => $this->string()->notNull(),
            'monument' => $this->string()->notNull(),
            'shovel' => $this->string()->notNull(),
            'repair_monument' => $this->string()->notNull(),
            'broke_monument' => $this->string()->notNull(),
            'repair_fences' => $this->string()->notNull(),
            'broke_fences' => $this->string()->notNull(),
            'suck' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%player_inventory}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190406_115130_create_table_player_inventory cannot be reverted.\n";

        return false;
    }
    */
}
