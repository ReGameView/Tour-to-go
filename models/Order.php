<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_property
 * @property double $price
 * @property string $comment
 * @property int $id_user
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_property', 'id_user'], 'integer'],
//            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client' => 'ID Клиента',
            'id_property' => 'ID Недвижимости',
//            'price' => 'Цена',
            'comment' => 'Комментарий',
            'id_user' => 'ID Сотрудника',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }
}
