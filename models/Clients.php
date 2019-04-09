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
            'f' => 'F',
            'i' => 'I',
            'o' => 'O',
            'phone' => 'Phone',
            'address' => 'Address',
            'email' => 'Email',
        ];
    }
}
