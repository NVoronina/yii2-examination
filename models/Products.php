<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $title
 * @property string $short_desc
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $hide
 * @property string $category_id
 * @property string $artist_id
 * @property string $img_link
 * @property string $img_link_2
 * @property string $img_link_3
 * @property string $price
 * @property string $create_date
 * @property string $user_id
 *
 * @property Cart[] $carts
 * @property Categories $category
 * @property Artists $artist
 */
class Products extends \yii\db\ActiveRecord
{
    public $img;

    public function afterFind()
    {
        $this->img[] = "/img/products/" . $this->img_link;
        $this->img[] = "/img/products/" . $this->img_link_2;
        $this->img[] = "/img/products/" . $this->img_link_3;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'user_id'], 'required'],
            [['short_desc', 'description', 'meta_description'], 'string'],
            [['hide', 'category_id', 'artist_id', 'price', 'user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['title', 'meta_title', 'meta_keywords'], 'string', 'max' => 255],
            [['img_link', 'img_link_2', 'img_link_3'], 'string', 'max' => 1000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['artist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::className(), 'targetAttribute' => ['artist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'short_desc' => 'Короткое описание',
            'description' => 'Описание',
            'meta_title' => 'Мета заголовок',
            'meta_description' => 'Мета описание',
            'meta_keywords' => 'Мета ключевые слова',
            'hide' => 'Скрыть',
            'category_id' => 'ID категории',
            'artist_id' => 'ID художника',
            'img_link' => 'Картинка 1',
            'img_link_2' => 'Картинка 2',
            'img_link_3' => 'Картинка 3',
            'price' => 'Цена',
            'create_date' => 'Дата создания',
            'user_id' => 'ID пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artists::className(), ['id' => 'artist_id']);
    }
}
