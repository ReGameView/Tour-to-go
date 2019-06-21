<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_property
 * @property int $id_user
 * @property string $comment
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
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_property', 'id_user'], 'required', 'message' => 'Это поле обязательно к заполнению'],
            [['id_client', 'id_property', 'id_user'], 'integer', 'message' => 'Это поле должно быть числом'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['comment'], 'string', 'max' => 255, 'message' => 'Максимальное количество символов 255'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client' => 'Индификатор клиента',
            'id_property' => 'Индификатор недвижимости',
            'id_user' => 'Инидификатор оператора',
            'comment' => 'Комментарий к заказу',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(RealProperty::className(), ['id' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['id' => 'id_client']);
    }
}
