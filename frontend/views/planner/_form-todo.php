<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\UserCRUD;
use common\models\Category;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->all(), 'id_category', 'category_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'todo_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'due_date')->widget(
        DatePicker::className(), [
        // 'clientOptions' => ['defaultDate' => $model->wedding_date],
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control']
        ]
    ); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Undone' => 'Undone', 'Done' => 'Done', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
