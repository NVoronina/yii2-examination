<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $name
 * @property string $surname
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $date_create
 * @property string $status
 * @property integer $user_id
 * @property string $products_array
 *
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'address', 'phone', 'email', 'user_id', 'products_array'], 'required'],
            //[['date_create'], 'safe'],
            [['user_id'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['address', 'products_array'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['email', 'status'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'email' => 'Email',
            'date_create' => 'Date Create',
            'status' => 'Status',
            'user_id' => 'User ID',
            'products_array' => 'Products Array',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
