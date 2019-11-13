<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>