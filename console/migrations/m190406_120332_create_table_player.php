<?php

use yii\db\Migration;

/**
 * Class m190406_120332_create_table_player
 */
class m190406_120332_create_table_player extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%player_resources}}', [
            'id' => $this->primaryKey()->unique(),
            'id_player' => $this->integer()->unique(),
            'skull' => $this->integer()->notNull(),
            'gold_skull' => $this->integer()->notNull(),
            'vodka' => $this->integer()->notNull(),
            'marry' => $this->integer()->notNull(),
            'lemon' => $this->integer()->notNull(),
            'dynamite' => $this->integer()->notNull(),
            'energy' => $this->integer()->notNull(),
            'time' => $this->integer()->notNull(),
            'points' => $this->integer()->notNull(),
            'level' => $this->integer()->notNull(),
            'clan_id' => $this->integer()->notNull(),
            'safe_skull' => $this->integer()->notNull(),
            'safe_vodka' => $this->integer()->notNull(),
            'friends' => $this->string(),
            'location' => $this->integer()->notNull(),
            'place' => $this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%player_resources}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190406_120332_create_table_player cannot be reverted.\n";

        return false;
    }
    */
}
