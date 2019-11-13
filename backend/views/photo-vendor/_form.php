<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Vendor;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoVendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-vendor-form">

    <?php $form = ActiveForm::begin(['options' => 
        ['enctype' => 'multipart/form-data']]); ?>

    <!-- <?= $form->field($model, 'id_vendor')->textInput() ?> -->

    <?= $form->field($model, 'id_vendor')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Vendor::find()->all(), 'id_vendor', 'vendor_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Vendor'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <!-- <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'file_photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
