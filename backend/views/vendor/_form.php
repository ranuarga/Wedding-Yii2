<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Category;
use common\models\Location;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vendor_name')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'id_location')->dropDownList(
            ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name'),
            ['prompt' => 'Select Location']
    ) ?> -->

    <?= $form->field($model, 'id_location')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Location'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'max_price')->textInput() ?>

    <?= $form->field($model, 'min_price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'rating')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
