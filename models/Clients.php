<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property int $id_user
 * @property string $f Фамилия
 * @property string $i Имя
 * @property string $o Отчество
 * @property string $phone Телефон
 * @property string $city
 * @property string $area
 * @property string $street
 * @property string $house
 * @property string $floor
 * @property string $apartment
 * @property string $email Email
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
            [['id_user'], 'integer', 'message' => 'Это поле должно быть числом'],
            [['city', 'street', 'house'], 'required', 'message' => 'Это поле обязательно к заполнению'],
            [['f', 'i', 'o', 'phone', 'city', 'area', 'street', 'house', 'floor', 'apartment', 'email'], 'string', 'max' => 255, 'message' => 'Максимальное количество символов 255'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Индификатор пользователя',
            'f' => 'Фамилия',
            'i' => 'Имя',
            'o' => 'Отчество',
            'phone' => 'Телефон',
            'city' => 'Город',
            'area' => 'Район',
            'street' => 'Улица',
            'house' => 'Дом',
            'floor' => 'Этаж',
            'apartment' => 'Квартира',
            'email' => 'Email',
        ];
    }

    public function getFullName()
    {
        return $this->f . " " . $this->i . " " . $this->o;
    }

//    public function getProperty()
//    {
//        return $this->hasMany(Order::className(), [''])
//    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_client' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
