<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Contact us</h1>
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
                        <a href="<?= Url::to(['site/'])?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Contact us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-6">
                <div class="well-box">
                    <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => false]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-6 contact-info">
                    <div class="well-box">
                        <ul class="listnone">
                            <li class="address">
                                <h2><i class="fa fa-map-marker"></i>Location</h2>
                                <p>Jl. Raya ITS – Kampus PENS Sukolilo, Surabaya 60111, INDONESIA</p>
                            </li>
                            <li class="email">
                                <h2><i class="fa fa-envelope"></i>E-Mail</h2>
                                <p>d4itb@gmail.com</p>
                            </li>
                            <li class="call">
                                <h2><i class="fa fa-phone"></i>Contact</h2>
                                <p>+62 895-0877-5103</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.685757508759!2d112.792233!3d-7.2765523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09c7!2sPoliteknik+Elektronika+Negeri+Surabaya!5e0!3m2!1sid!2sid!4v1559891721065!5m2!1sid!2sid"></iframe>