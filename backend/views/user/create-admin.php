<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-crud-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>Please fill out the following fields to signup:</p> -->

    <div class="user-crud-form">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>
