<?php

namespace app\models;

use phpDocumentor\Reflection\Types\ContextFactory;
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
            [['id_type', 'city', 'street', 'house'], 'required', 'message' => 'Это поле обязательно к заполнению'],
            [['id_type', 'count'], 'integer', 'message' => 'Это поле должно быть числом'],
            [['type'], 'string'],
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
            'per' => 'Период (в уточнительной падеже)',
            'count' => 'Количество периода (дней/недель/месяц)',
        ];
    }

    public function getTypepr()
    {
        return $this->hasOne(TypeProperty::className(), ['id' => 'id_type']);
    }

    public function getFullAddress()
    {
        $area = "";
        if($this->area != NULL)
            $area = " район " . $this->area;
        return "г. ". $this->city . $area . " ул.".$this->street. " д." .$this->house . " кв." . $this->apartment;
    }

}
