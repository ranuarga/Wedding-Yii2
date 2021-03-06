<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\UserCRUD;

/* @var $this yii\web\View */
/* @var $model common\models\Guestlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestlist-form">

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

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'invitation')->dropDownList([ 'Not Yet' => 'Not Yet', 'Sent' => 'Sent', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Not Responded' => 'Not Responded', 'Accepted' => 'Accepted', 'Declined' => 'Declined', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
