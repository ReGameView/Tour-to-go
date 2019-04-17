<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "real_property".
 *
 * @property int $id
 * @property string $name
 * @property string $disc
 * @property string $stats
 * @property double $price
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
            [['name'], 'required'],
            [['price'], 'number'],
            [['name', 'disc', 'stats'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'disc' => 'Описание',
            'stats' => 'Количество звёзд',
            'price' => 'Цена',
        ];
    }
}
