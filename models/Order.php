<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_property
 * @property string $comment
 * @property int $id_user
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property Clients $client
 * @property RealProperty $property
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
            [['id_client', 'id_property', 'id_user'], 'required'],
            [['id_client', 'id_property', 'id_user'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => RealProperty::className(), 'targetAttribute' => ['id_property' => 'id']],
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
            'comment' => 'Комментарий',
            'id_user' => 'Индификатор пользователя',
            'created_at' => 'Время создания',
            'updated_at' => 'Время последнего обновления',
            'deleted_at' => 'Время удаление',
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
