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

        $city = ['Глазов', 'Ижевск', 'Сарапул', "Можга", "Камбарка", "Воткинск"];
        $count = rand(100, 200);
        for($i = 0; $i < $count; $i++)
        {
            $arrayPerson = json_decode(file_get_contents('https://randus.org/api.php'));
            $randCity = $city[random_int(0, count($city) - 1)];
            $this->insert('clients', [
                'f' => $arrayPerson->lname,
                'i' => $arrayPerson->fname,
                'o' => $arrayPerson->patronymic,
                'phone' => $arrayPerson->phone,
                'address' => $randCity . 'г, ул.' . $arrayPerson->street . ', д.'. $arrayPerson->house .', кв.'. $arrayPerson->apartment,
                'email' => $arrayPerson->login . '@mail.ru'
            ]);
        }

        $this->createTable('real_property', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'disc' => Schema::TYPE_STRING,
            'stats' => Schema::TYPE_STRING . ' DEFAULT 0',
            'price' => Schema::TYPE_DOUBLE . ' DEFAULT 0',
            'per' => Schema::TYPE_STRING . ' NOT NULL',
            'count' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('real_property_images', [
            'id' => Schema::TYPE_PK,
            'sort' => Schema::TYPE_INTEGER,
            'prop_id' => Schema::TYPE_INTEGER,
            'path' => Schema::TYPE_STRING . ' DEFAULT "/img/default/404photo.png"',
        ]);

       /* $this->createIndex('fk_prop_img', 'real_property_img', 'prop_id');
        $this->addForeignKey(
            'fk_prop_img',
            'real_property_img',
            'prop_id',
            'real_property',
            'id'
        );*/



//        $defaultComment =
//        [
//            'Квартира чистая.'
//        ];
        $count = rand(100, 200);
        for($i = 0; $i < $count; $i++)
        {
            $arrayPerson = json_decode(file_get_contents('https://randus.org/api.php'));
            $randCity = $city[random_int(0, count($city) - 1)];

            $this->insert('real_property',[
                'name' => $randCity . 'г, ул.' . $arrayPerson->street . ', д.'. $arrayPerson->house .', кв.'. $arrayPerson->apartment,
                'disc' => '', // TODO:: придумать что то со страндартными комментариями
                'stats' => $price = rand(0, 10) / 2,
                'price' => rand(8000, 12000) + $price * 500,
                'per' => 'days',
                'count' => '30'
            ]);
        }

        //FIXME:: ПОСМОТРИ!!
        //create index fk_prop_img on real_property_img (prop_id) ...Exception: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'yii2basic.real_property_img' doesn't exist
        //The SQL being executed was: ALTER TABLE `real_property_img` ADD INDEX `fk_prop_img` (`prop_id`) (C:\OSPanel\domains\basic\vendor\yiisoft\yii2\db\Schema.php:664)
        //#0 C:\OSPanel\domains\basic\vendor\yiisoft\yii2\db\Command.php(1295): yii\db\Schema->convertException(Object(PDOException), 'ALTER TABLE `re...')
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
