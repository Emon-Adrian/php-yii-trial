<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220131_101554_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(50)->notNull(),
            'username' => $this->string(50)->notNull()->unique(),
            'access_token' => $this->string(100)->notNull()->unique(),
            'auth_key' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
