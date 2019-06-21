<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "query_clients".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_type
 * @property string $city
 * @property string $area
 * @property string $street
 * @property string $house
 * @property string $floor
 * @property string $apartment
 * @property string $disc
 * @property double $price
 * @property string $per
 * @property int $count
 */
class QueryClients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query_clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_type', 'count'], 'integer', 'message' => 'Это поле должно быть числом'],
            [['id_type'], 'required', 'message' => 'Это поле обязательно к заполнению'],
            [['price'], 'number', 'message' => 'Это поле должно быть числом'],
            [['city', 'area', 'street', 'house', 'floor', 'apartment', 'disc', 'per'], 'string', 'max' => 255, 'message' => 'Максимальное количество символов 255'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Индификатор',
            'id_client' => 'Индификатор клиента',
            'id_type' => 'Индификатор типа',
            'city' => 'Город',
            'area' => 'Район',
            'street' => 'Улица',
            'house' => 'Дом',
            'floor' => 'Этаж',
            'apartment' => 'Квартира',
            'disc' => 'Описание',
            'price' => 'Цена',
            'per' => 'За какое кол-во времени',
            'count' => 'Кол-во per',
        ];
    }


    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'id_client']);
    }

    public function getType()
    {
        return $this->hasOne(TypeProperty::className(), ['id' => 'id_type']);
    }
}
