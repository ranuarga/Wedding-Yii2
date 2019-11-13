<?php

// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use kartik\editable\Editable;

$this->title = 'Guestlist';

?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>
                                    My Guest
                                    <small>
                                        <?= $amount ?> Guest
                                    </small>
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> 
                                <a href="<?= Url::to(['create-guest'])?>" class="btn btn-default">
                                    New Guest
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="budget-board">
            <div class="list-group">
                <div class="list-group-item active">
                    <div class="row">
                        <div class="col-md-4">Guest Name</div>
                        <div class="col-md-2">Amount</div>
                        <div class="col-md-2">Invitation</div>
                        <div class="col-md-2">Status</div>
                        <div class="col-md-2">Action</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <?php
                    foreach ($guestlist as $model) {
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <?= $model->guest_name ?>
                    </div>
                    <div class="col-md-2">
                        <?= $model->amount ?>
                    </div>
                    <div class="col-md-2">
                        <?= $model->invitation ?>
                    </div>
                    <div class="col-md-2">
                        <?= $model->status ?>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= Url::to(['update-guest', 'id' => $model->id_guest]) ?>" class="btn-circle" title="Edit list">
                            <i class="fa fa-edit"></i>
                        </a> 
                        <a href="<?= Url::to(['delete-guest', 'id' => $model->id_guest]) ?>" class="btn-circle" title="Delete List">
                            <i class="fa fa-trash"></i>
                        </a> 
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="col-md-12 tp-pagination">
            <ul class="pagination">
                <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                ?>
            </ul>
        </div>
    </div>
</div>