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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \dmstr\modules\news\models\ImageGallery[] $imageGalleries
 * @property \dmstr\modules\news\models\TextBlock[] $textBlocks
 * @property \dmstr\modules\news\models\VideoGallery[] $videoGalleries
 */
class News extends \yii\db\ActiveRecord
{
    public $imageFile;
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
                'updatedAtAttribute' => 'updated_at',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['title', 'text_html', 'news_discriprion'], 'required'],
            [['text_html'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title','news_discriprion'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg']],
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
            'image' => 'Фото',
            'created_at' => 'Опубликовано',
            'updated_at' => 'Обновлено'
        ];
    }

    public function upload()
    {
        if (!empty($this->imageFile)) {
            $path = 'img/news/' . time() . '-' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $fullPath = Yii::getAlias('@storage/'.$path);
            $this->imageFile->saveAs($fullPath);
            $this->image = '/storage/'. $path;
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->upload();

            return true;
        }
        return false;
    }
}
