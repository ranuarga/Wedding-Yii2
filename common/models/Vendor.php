<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $id_vendor
 * @property string $vendor_name
 * @property int $id_category
 * @property string $address
 * @property int $id_location
 * @property string $email
 * @property string $phone
 * @property string $website
 * @property string $content
 * @property int $max_price
 * @property int $min_price
 * @property int $quantity
 * @property string $rating
 *
 * @property PhotoVendor[] $photoVendors
 * @property Location $location
 * @property Category $category
 * @property Wishlist[] $wishlists
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_name', 'id_category', 'address', 'id_location'], 'required'],
            [['id_category', 'id_location', 'max_price', 'min_price', 'quantity'], 'integer'],
            [['content', 'rating'], 'string'],
            [['vendor_name'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 255],
            [['email', 'phone', 'website'], 'string', 'max' => 50],
            [['id_location'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['id_location' => 'id_location']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vendor' => 'Id Vendor',
            'vendor_name' => 'Vendor Name',
            'id_category' => 'Category',
            'address' => 'Address',
            'id_location' => 'Location',
            'email' => 'Email',
            'phone' => 'Phone',
            'website' => 'Website',
            'content' => 'Content',
            'max_price' => 'Max Price',
            'min_price' => 'Min Price',
            'quantity' => 'Quantity',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoVendors()
    {
        return $this->hasMany(PhotoVendor::className(), ['id_vendor' => 'id_vendor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id_location' => 'id_location']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id_category' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::className(), ['id_vendor' => 'id_vendor']);
    }
}
