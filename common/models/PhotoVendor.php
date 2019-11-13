<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "photo_vendor".
 *
 * @property int $id_photo
 * @property int $id_vendor
 * @property string $photo
 *
 * @property Vendor $vendor
 */
class PhotoVendor extends \yii\db\ActiveRecord
{
    public $file_photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vendor'], 'required'],
            [['id_vendor'], 'integer'],
            [['photo', 'photo_path'], 'string', 'max' => 255],
            [['file_photo'], 'file', 'extensions' => 'gif, jpg, jpeg, png, svg'],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['id_vendor' => 'id_vendor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_photo' => 'Id Photo',
            'id_vendor' => 'Vendor',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id_vendor' => 'id_vendor']);
    }
}
