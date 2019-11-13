<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "category".
 *
 * @property int $id_category
 * @property string $category_name
 * @property string $description
 * @property string $category_pic
 *
 * @property Todo[] $todos
 * @property Vendor[] $vendors
 */
class Category extends \yii\db\ActiveRecord
{
    public $file_photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'description'], 'required'],
            [['description'], 'string'],
            [['category_name'], 'string', 'max' => 75],
            [['category_pic', 'pic_path'], 'string', 'max' => 255],
            [['file_photo'], 'file', 'extensions' => 'gif, jpg, jpeg, png, svg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Id Category',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'category_pic' => 'Category Pic',
            'pic_path' => 'Pic Path'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['id_category' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::className(), ['id_category' => 'id_category']);
    }
}
