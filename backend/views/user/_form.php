<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Location;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\UserCRUD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-crud-form">

    <?php $form = ActiveForm::begin(['options' => 
        ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>    
    
    <?= $form->field($model, 'wedding_date')->widget(
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

    <?= $form->field($model, 'budget')->textInput() ?>

    <?= $form->field($model, 'file_photo')->fileInput() ?>

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

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
