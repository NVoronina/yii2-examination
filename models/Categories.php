<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $hide
 * @property string $parent_category_id
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['hide', 'parent_category_id'], 'integer'],
            [['title', 'meta_title', 'meta_keywords'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 3000],
            [['meta_description'], 'string', 'max' => 500],
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
            'description' => 'Описание',
            'meta_title' => 'Мета описание',
            'meta_description' => 'Мета описание',
            'meta_keywords' => 'Мета ключевые слова',
            'hide' => 'Скрыть',
            'parent_category_id' => 'ID родительской категории',
        ];
    }
}
