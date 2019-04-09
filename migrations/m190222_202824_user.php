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

        $this->createTable('clients', [
            'id' => Schema::TYPE_PK,
            'f' => Schema::TYPE_STRING,
            'i' => Schema::TYPE_STRING,
            'o' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING,
            'address' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING
        ]);

        for($i = 0; $i < 100; $i++)
        {
            $arrayPerson = json_decode(file_get_contents('https://randus.org/api.php'));
            $this->insert('clients', [
                'f' => $arrayPerson->lname,
                'i' => $arrayPerson->fname,
                'o' => $arrayPerson->patronymic,
                'phone' => $arrayPerson->phone,
                'address' => $arrayPerson->city . 'г, ул.' . $arrayPerson->street . ', д.'. $arrayPerson->house .', кв.'. $arrayPerson->apartment,
                'email' => $arrayPerson->login . '@mail.ru'
            ]);
        }

        $this->createTable('real_property', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'disc' => Schema::TYPE_STRING,
            'stats' => Schema::TYPE_STRING . ' DEFAULT 0',
            'price' => Schema::TYPE_DOUBLE . ' DEFAULT 0',
        ]);

        $this->insert('real_property', [

        ]);

        $this->createTable('order', [
            'id' => Schema::TYPE_PK,
            'id_client' => Schema::TYPE_INTEGER,
            'id_property' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_DOUBLE,
            'comment' => Schema::TYPE_STRING,
            'id_user' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
            'deleted_at' => Schema::TYPE_DATETIME,
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
