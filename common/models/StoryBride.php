<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "story_bride".
 *
 * @property int $id_story
 * @property string $title
 * @property string $content
 * @property string $story_pic
 * @property string $updated_at
 */
class StoryBride extends \yii\db\ActiveRecord
{
    public $file_photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'story_bride';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['updated_at'], 'safe'],
            [['file_photo'], 'file', 'extensions' => 'gif, jpg, jpeg, png, svg'],
            [['title', 'story_pic', 'pic_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_story' => 'Id Story',
            'title' => 'Title',
            'content' => 'Content',
            'story_pic' => 'Story Pic',
            'updated_at' => 'Updated At',
        ];
    }
}
