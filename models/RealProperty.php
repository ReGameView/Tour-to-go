<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "real_property".
 *
 * @property int $id
 * @property int $id_type
 * @property string $city
 * @property string $area
 * @property string $street
 * @property string $house
 * @property string $floor
 * @property string $apartment
 * @property string $disc
 * @property string $type
 * @property double $price
 * @property string $per
 * @property int $count
 */
class RealProperty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type', 'city', 'street', 'house'], 'required'],
            [['id_type', 'count'], 'integer'],
            [['type'], 'string'],
            [['price'], 'number'],
            [['city', 'area', 'street', 'house', 'floor', 'apartment', 'disc', 'per'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_type' => 'Индификатор типа',
            'city' => 'Город',
            'area' => 'Район',
            'street' => 'Улица',
            'house' => 'Дом',
            'floor' => 'Этаж',
            'apartment' => 'Квартира',
            'disc' => 'Описание',
            'type' => 'Тип', // Продажа/Аренда
            'price' => 'Цена',
            'per' => 'За какое кол-во времени',
            'count' => 'Кол-во per',
        ];
    }

    public function getFullAddress()
    {
        $area = "";
        if($this->area != NULL)
            $area = " район " . $this->area;
        return "г. ". $this->city . $area . " ул.".$this->street. " д." .$this->house . " кв." . $this->apartment;
    }
}
