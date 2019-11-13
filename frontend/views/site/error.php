<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <!-- <div class="icon-circle"> 
                        <i class="icon icon-size-60 icon-heart icon-white"></i>
                    </div> -->
                    <h1><?= nl2br(Html::encode($message)) ?></h1>
                    <p><?= Html::encode($this->title) ?></p>
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
                    <li class="active">
                        <?= Html::encode($this->title) ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-block mb80">
                    <h2>
                        <i class="fa fa-warning"></i>
                        <?= Html::encode($this->title) ?>
                    </h2>
                    <p>
                        The above error occurred while the Web server was processing your request.
                        Please contact us if you think this is a server error. Thank you.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>