<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TodoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_todo') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'todo_name') ?>

    <?= $form->field($model, 'due_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
