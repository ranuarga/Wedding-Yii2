<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuestlistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_guest') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'guest_name') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'invitation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
