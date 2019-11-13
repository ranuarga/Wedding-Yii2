<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <!-- <div class="icon-circle">
                        <i class="icon icon-size-60 icon-lock icon-white"></i>
                        <i class="fa fa-user-lock"></i>
                    </div> -->
                    <h1>Create a FREE account &amp; save your date.</h1>
                    <p>Start Planning, It's Free!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li>
                    <a href="
                        <?= Url::to(['site/']); ?>
                    ">Home</a>
                    </li>
                    <li class="active">Sign Up</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 singup-couple">
                <div class="well-box">
                    <h2>Let's turn your wedding into a reality!</h2>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <p>
                    Already a Member? 
                    <a href="<?= Url::to(['site/login']); ?>">
                        Log In
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 feature-block">
                        <div class="well-box">
                            <div class="feature-icon"> <i class="fas fa-tasks"></i> </div>
                            <div class="feature-content">
                                <h3>Wedding Checklist</h3>
                                <p>This wedding checklist contains the task you need to do before the wedding and on the wedding day.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 feature-block">
                        <div class="well-box">
                            <div class="feature-icon"><i class="far fa-heart"></i></div>
                            <div class="feature-content">
                                <h3>Everything you need</h3>
                                <p>You can find all your wedding needs such as venues, vendors, etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>