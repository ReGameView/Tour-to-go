<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m190222_202824_user
 */
class m190222_202824_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING,
        ]);

        $this->insert('user', [
            'username' => 'admin',
            'password' => 'admin'
        ]);





        $this->createTable('order', [

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190222_202824_user cannot be reverted.\n";

        return false;
    }
}
