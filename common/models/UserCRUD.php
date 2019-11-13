<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $wedding_date
 * @property int $budget
 * @property string $user_pic
 * @property string $pic_path
 * @property int $id_location
 * @property int $created_at
 * @property int $updated_at
 * @property Guestlist[] $guestlists 
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property Todo[] $todos
 * @property Location $location
 * @property Wishlist[] $wishlists
 */
class UserCRUD extends \yii\db\ActiveRecord
{
    public $file_photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'budget', 'id_location', 'created_at', 'updated_at'], 'integer'],
            [['wedding_date'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'user_pic', 'pic_path'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['file_photo'], 'file', 'extensions' => 'gif, jpg, jpeg, png, svg'],
            [['id_location'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['id_location' => 'id_location']],
        ];
    }

    /**
     * @inheritdoc
     */ 
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'wedding_date' => 'Wedding Date',
            'budget' => 'Budget',
            'user_pic' => 'User Pic',
            'pic_path' => 'Pic Path',
            'id_location' => 'Location',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['id_user' => 'id']);
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
    public function getWishlists() 
    { 
        return $this->hasMany(Wishlist::className(), ['id_user' => 'id']); 
    } 

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getGuestlists() 
    { 
        return $this->hasMany(Guestlist::className(), ['id_user' => 'id']); 
    } 
}
