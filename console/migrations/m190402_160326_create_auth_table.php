<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth}}`.
 */
class m190402_160326_create_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%auth}}', [
            'id' => $this->primaryKey(),
            'auth_id' => $this->string()->notNull(),
            'nickname' => $this->string()->notNull(),
            'timestamp' => $this->integer()->notNull(),
            'local_token' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%auth}}');
    }
}
