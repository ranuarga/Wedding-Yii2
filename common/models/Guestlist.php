<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guestlist".
 *
 * @property int $id_guest
 * @property int $id_user
 * @property string $guest_name
 * @property int $amount
 * @property string $invitation
 * @property string $status
 *
 * @property User $user
 */
class Guestlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guestlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'guest_name', 'amount', 'invitation', 'status'], 'required'],
            [['id_user', 'amount'], 'integer'],
            [['invitation', 'status'], 'string'],
            [['guest_name'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guest' => 'Id Guest',
            'id_user' => 'User',
            'guest_name' => 'Guest Name',
            'amount' => 'Amount',
            'invitation' => 'Invitation',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
