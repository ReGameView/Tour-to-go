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
        /**
         * CREATE TABLES
         */
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING,
            'role' => "ENUM('client', 'admin')"
        ]);

        $this->createTable('clients', [
            'id' => Schema::TYPE_PK,
            'id_user' => $this->integer(),
            'f' => Schema::TYPE_STRING. " COMMENT 'Фамилия'",
            'i' => Schema::TYPE_STRING. " COMMENT 'Имя'",
            'o' => Schema::TYPE_STRING. " COMMENT 'Отчество'",
            'phone' => Schema::TYPE_STRING. " COMMENT 'Телефон'",
            'city' => $this->string()->notNull(),
            'area' => $this->string(),
            'street' => $this->string()->notNull(),
            'house' => $this->string()->notNull(),
            'floor' => $this->string(),
            'apartment' => $this->string(),
            'email' => Schema::TYPE_STRING. " COMMENT 'Email'"
        ]);

        $this->createTable('real_property', [
            'id' => $this->primaryKey(),
            'id_type' => $this->integer()->notNull(),
            'city' => $this->string()->notNull(),
            'area' => $this->string(),
            'street' => $this->string()->notNull(),
            'house' => $this->string()->notNull(),
            'floor' => $this->string(),
            'apartment' => $this->string(),
            'disc' => $this->string(),
            'type' => "ENUM ('Продажа', 'Аренда') DEFAULT 'Продажа'",
            'price' => Schema::TYPE_DOUBLE . ' DEFAULT 0',
            'per' => $this->string(),
            'count' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('real_property_images', [
            'id' => Schema::TYPE_PK,
            'prop_id' => Schema::TYPE_INTEGER,
            'path' => Schema::TYPE_STRING . ' DEFAULT "/img/default/404photo.png"',
        ]);

        $this->createTable('order', [
            'id' => Schema::TYPE_PK,
            'id_client' => Schema::TYPE_INTEGER,
            'id_property' => Schema::TYPE_INTEGER,
            'id_user' => Schema::TYPE_INTEGER. " NOT NULL ",
            'comment' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_DATETIME. " NOT NULL DEFAULT CURRENT_TIMESTAMP",
            'updated_at' => Schema::TYPE_DATETIME,
            'deleted_at' => Schema::TYPE_DATETIME,
        ]);

        $this->createTable('query_clients', [
            'id' => Schema::TYPE_PK,
            'id_client' => Schema::TYPE_INTEGER,
            'id_type' => $this->integer()->notNull(),
            'city' => $this->string()->notNull(),
            'area' => $this->string(),
            'street' => $this->string()->notNull(),
            'house' => $this->string()->notNull(),
            'floor' => $this->string(),
            'apartment' => $this->string(),
            'disc' => $this->string(),
            'price' => Schema::TYPE_DOUBLE . ' DEFAULT 0',
            'per' => $this->string() . ' NOT NULL',
            'count' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('type_property', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
//            'id_type' => $this->string()
        ]);

        /**
         * INSERT
         */
        $this->insert('user', [
            'username' => 'admin',
            'password' => 'secret',
            'role' => 'admin'
        ]);

        $city = ['Глазов', 'Ижевск', 'Сарапул', "Можга", "Камбарка", "Воткинск"];
        $countUser = rand(10, 50);
        $j = 2;
        for($i = 0; $i < $countUser; $i++)
        {
            if((rand(1,2) % 2 ? true : false))
            {
                $this->insert('user', [
                    'id' => $j,
                    'username' => $this->RandomString(),
                    'password' => $this->RandomString(),
                    'role' => 'client'
                ]);
                $j++;
                $check = true;
            }
            $arrayPerson = json_decode(file_get_contents('https://randus.org/api.php'));
            $randCity = $city[random_int(0, count($city) - 1)];
            $this->insert('clients', [
                'f' => $arrayPerson->lname,
                'i' => $arrayPerson->fname,
                'o' => $arrayPerson->patronymic,
                'phone' => $arrayPerson->phone,
                'city' => $randCity,
                'street' => $arrayPerson->street,
                'house' =>  $arrayPerson->house,
                'apartment' => $arrayPerson->apartment,
                'email' => $arrayPerson->login . '@mail.ru',
                'id_user' => $check ? $j : ""
            ]);
            $check = false;
        }
        $defaultComment =
        [
            'Квартира' => [
                'квартира чистая', 'интернет', 'кабельное', 'нет плесени', 'нет тараканов', "новые счётчики", "парковка", "прекрасный вид из окна", "пластиковые окна", "новый ремонт"
            ],
            'Гараж' => [
                'отопление', 'подвал', 'свет', 'стальные ворота', 'нет мышей', 'утеплен'
            ],
            'Дача' => [
                'плодородная земля', 'забор', 'баня', 'хороший фундамент'
            ]
        ];
        $countProperty = rand(5, 50);
        $countApartament = rand(1, 4);
        for($i = 0; $i < $countProperty; $i++)
        {
            $arrayPerson = json_decode(file_get_contents('https://randus.org/api.php'));
            $randCity = $city[random_int(0, count($city) - 1)];
            $randType = rand(1, count($defaultComment)); // Тип недвижимости
            if($randType == 1)
            {
                $randPrice = "Продажа";

            }else {
                $randPrice = rand(1, 2) % 2 ? "Продажа" : "Аренда";
            }
            $comment = $this->RandomComment($defaultComment[array_keys($defaultComment)[$randType - 1]]);
            $this->insert('real_property',[
                'id_type' => $randType,
                'city' => $randCity,
                'area' => "",
                'street' => $arrayPerson->street,
                'house' => $arrayPerson->house,
                'floor' => "",
                'apartment' => $randType != 1 ? $arrayPerson->apartment : "",
                'disc' => $comment,
                'type' => $randPrice,
                'price' => ($randPrice == "Продажа" ? 500 : 1) * (rand(8000, 12000) + ($countApartament * 5) * 500),
                'per' => ($randPrice == "Продажа" ? "" : "дней"),
                'count' => ($randPrice == "Продажа" ? "" : "30"),
            ]);
        }

        foreach ($defaultComment as $key => $item) {
            $this->insert('type_property',[
                'title' => $key,
            ]);
        }

        $count = rand(5, 20);
        $arrayProperty = [];
        for($i = 1; $i < $count; $i++)
        {
            $property = rand(0, $countProperty - 1);
            while(!in_array($property, $arrayProperty))
            {
                $property = rand(1, $countProperty);
                $this->insert('order', [
                    'id_client' => rand(1, $countUser),
                    'id_property' => $property,
                    'comment' => '',
                    'id_user' => rand(1, $j),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'deleted_at' => null
                ]);
                array_push($arrayProperty, $property);
            }
        }



//        $this->addForeignKey("FK_PROPERTY_IMG", 'real_property_images', 'prop_id', 'real_property', 'id');
//
//        $this->addForeignKey('FK_order_clients', 'order', 'id_client', 'clients', 'id');
//        $this->addForeignKey('FK_order_property', 'order', 'id_property', 'real_property', 'id');
//
//        $this->addForeignKey('FK_CLIENTS_ID', 'query_clients', 'id_client', 'client', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_PROPERTY_IMG', 'real_property_images');
        $this->dropForeignKey('FK_order_clients', 'order');
        $this->dropForeignKey('FK_order_property', 'order');
        $this->dropForeignKey('FK_CLIENTS_ID', 'query_clients');

        $this->dropTable('user');
        $this->dropTable('clients');
        $this->dropTable('real_property');
        $this->dropTable('real_property_images');
        $this->dropTable('order');
        $this->dropTable('query_clients');
        return true;
    }

    function RandomString()
    {
        $characters = '01NCcGPw8VKLNYvjEPgqLbhZQbiKGpEpPNU81zxdhGqj8dP2rp7mtmDKMxWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    function RandomComment($defaultComment)
    {
        $exit = false;
        $array = [];
        $comment = "";
        $countComment = rand(1, count($defaultComment));
        for($i = 0; $i < $countComment; $i++) {
            $randIndex = rand(0, count($defaultComment) - 1);
            while (in_array($defaultComment[$randIndex], $array))
            {
                $randIndex = rand(0, count($defaultComment));
                if(count($defaultComment) == count($array))
                {
                    $exit = true;
                    break;
                }
            }
            if($exit)
            {
                $exit = false;
                break;
            }
            if($comment != "")
                $comment .= ", ";
            $comment .= ucfirst($defaultComment[$randIndex]);
            $array[] = $defaultComment[$randIndex];
        }
        return $comment;
    }
}
