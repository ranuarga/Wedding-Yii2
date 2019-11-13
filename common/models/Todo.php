<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property int $id_todo
 * @property int $id_user
 * @property int $id_category
 * @property string $todo_name
 * @property string $due_date
 * @property string $status
 *
 * @property User $user
 * @property Category $category
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo_name', 'status'], 'required'],
            [['id_user', 'id_category'], 'integer'],
            [['due_date'], 'safe'],
            [['status'], 'string'],
            [['todo_name'], 'string', 'max' => 75],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_todo' => 'Id Todo',
            'id_user' => 'User',
            'id_category' => 'Category',
            'todo_name' => 'Todo Name',
            'due_date' => 'Due Date',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id_category' => 'id_category']);
    }
}
