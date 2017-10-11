<?php
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "dmstr_news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text_html
 * @property string $location
 * @property string $published_at
 * @property string $image
 * @property string $image_source
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \dmstr\modules\news\models\ImageGallery[] $imageGalleries
 * @property \dmstr\modules\news\models\TextBlock[] $textBlocks
 * @property \dmstr\modules\news\models\VideoGallery[] $videoGalleries
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimeStampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text_html', 'news_discriprion', 'published_at', 'image', 'image_source'], 'required'],
            [['text_html'], 'string'],
            [['published_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'location','news_discriprion', 'image', 'image_source'], 'string', 'max' => 255]
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
            'text_html' => 'Текст',
            'news_discriprion'=> 'Описание новости',
            'location' => 'Location',
            'published_at' => 'Опубликовано',
            'image' => 'Фото',
            'image_source' => 'Image Source',
            'created_at' => 'Опубликовано',
            'updated_at' => 'Обновлено'
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
}
