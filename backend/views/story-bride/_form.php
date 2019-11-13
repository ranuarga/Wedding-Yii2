<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StoryBride */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="story-bride-form">

    <?php $form = ActiveForm::begin(['options' => 
        ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'story_pic')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <?= $form->field($model, 'file_photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
