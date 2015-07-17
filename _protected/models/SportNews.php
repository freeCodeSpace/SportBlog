<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sport_news".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $img_ico
 * @property string $img
 * @property string $content
 * @property string $category
 */
class SportNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sport_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'img_ico', 'img', 'content', 'category'], 'required'],
            [['description', 'content', 'category'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['img_ico', 'img'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'img_ico' => 'Img Ico',
            'img' => 'Img',
            'content' => 'Content',
            'category' => 'Category',
        ];
    }
}
