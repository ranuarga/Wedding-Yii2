<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\UserCRUD;
use common\models\Vendor;

/* @var $this yii\web\View */
/* @var $model common\models\Wishlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wishlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(UserCRUD::find()->all(), 'id', 'username'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <!-- <?= $form->field($model, 'id_vendor')->textInput() ?> -->
    
    <?= $form->field($model, 'id_vendor')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Vendor::find()->all(), 'id_vendor', 'vendor_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Vendor'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
