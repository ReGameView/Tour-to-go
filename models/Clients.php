<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $f
 * @property string $i
 * @property string $o
 * @property string $phone
 * @property string $address
 * @property string $email
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['f', 'i', 'o', 'phone', 'address', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'f' => 'Фамилия',
            'i' => 'Имя',
            'o' => 'Отчество',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'email' => 'Email',
            'fullName' => 'Имя клиента'
        ];
    }

    public function getFullName()
    {
        return $this->f . " " . $this->i . " " . $this->o;
    }

    public function getProperty()
    {
//        return $this->hasMany(Order::className(), [''])
    }
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_client' => 'id']);
    }
}
