<?php

use yii\helpers\Url;

$this->title = 'Budget';

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
                                    My Budget 
                                    <small>
                                        <?= Yii::$app->formatter->asCurrency($myBudget) ?>
                                    </small>
                                </h1>
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
                        <div class="col-md-5">Vendor Name</div>
                        <div class="col-md-3">Min Price</div>
                        <div class="col-md-3">Max Price</div>
                        <div class="col-md-1">Delete</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <?php
                    foreach ($wishlist as $model) {
                ?>
                <div class="row">
                    <div class="col-md-5">
                        <a href="<?= Url::to(['site/view-vendor', 'id' => $model->id_vendor])?>"> 
                            <?= $model->vendor->vendor_name ?>
                        </a> 
                    </div>
                    <div class="col-md-3">
                        <?= Yii::$app->formatter->asCurrency($model->vendor->min_price) ?>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::$app->formatter->asCurrency($model->vendor->max_price) ?>
                    </div>
                    <div class="col-md-1">
                        <a href="<?= Url::to(['planner/remove-spend', 'id' => $model->id_wishlist ])?>" class="btn-delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <div class="col-md-5">Total</div>
                    <div class="col-md-3"><?= Yii::$app->formatter->asCurrency($minSpend) ?></div>
                    <div class="col-md-3"><?= Yii::$app->formatter->asCurrency($maxSpend) ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <div class="col-md-5">Budget - Total = </div>
                    <div class="col-md-3"><?= Yii::$app->formatter->asCurrency($myBudget - $minSpend) ?></div>
                    <div class="col-md-3"><?= Yii::$app->formatter->asCurrency($myBudget - $minSpend) ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>