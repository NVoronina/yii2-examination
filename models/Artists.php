<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artists".
 *
 * @property string $id
 * @property string $name
 * @property string $surname
 * @property string $description
 * @property integer $hide
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_key
 *
 * @property Products[] $products
 */
class Artists extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['description', 'meta_desc'], 'string'],
            [['hide'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['meta_title', 'meta_key'], 'string', 'max' => 255],
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
            'description' => 'Описание',
            'hide' => 'Скрыть',
            'meta_title' => 'Мета заголовок',
            'meta_desc' => 'Мета описание',
            'meta_key' => 'Мета ключевые слова',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['artist_id' => 'id']);
    }
}
