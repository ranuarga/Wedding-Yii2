<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\UserCRUD;
use common\models\Category;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_user')->dropDownList(
            ArrayHelper::map(UserCRUD::find()->all(), 'id', 'username'),
            ['prompt' => 'Select User']
    ) ?> -->

    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(UserCRUD::find()->all(), 'id', 'username'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <!-- <?= $form->field($model, 'id_category')->dropDownList(
            ArrayHelper::map(Category::find()->all(), 'id_category', 'category_name'),
            ['prompt' => 'Select Category']
    ) ?> -->

    <?= $form->field($model, 'id_category')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->all(), 'id_category', 'category_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'todo_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due_date')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'status')->dropDownList([ 'Undone' => 'Undone', 'Done' => 'Done', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
