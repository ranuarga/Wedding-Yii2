<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\PhotoVendor;

$this->title = 'Wishlist';

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
                                    My Wishlist 
                                    <small>
                                        <?= $countWishlist ?> 
                                        vendor in wishlist
                                    </small>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-board">
                        <?php
                            $i = 1;
                            foreach ($wishlist as $model) {
                                if($i % 3 == 1) {
                                    echo('<div class="row">');
                                }
                        ?>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="<?= Url::to(['site/view-vendor', 'id' => $model->id_vendor])?>">
                                        <img src="
                                            <?=
                                                PhotoVendor::find()
                                                    ->where(['id_vendor' => $model->id_vendor])
                                                    ->one()->photo;
                                            ?>
                                        " alt="wedding venue" class="img-responsive">
                                    </a>
                                    <div class="category-badge">
                                        <a href="<?= Url::to(['site/vendor', 'id' => $model->vendor->id_category ])?>" class="category-link">
                                            <?= $model->vendor->category->category_name ?>
                                        </a>
                                    </div>
                                    <div class="favorite-action"> 
                                        <a href="<?= Url::to(['planner/unwish', 'id' => $model->id_wishlist ])?>" class="fav-icon">
                                            <i class="fa fa-close"></i>
                                        </a> 
                                    </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2>
                                            <a href="<?= Url::to(['site/view-vendor', 'id' => $model->id_vendor])?>" class="title">
                                                <?= $model->vendor->vendor_name?>
                                            </a>
                                        </h2>
                                        <div class="vendor-meta"> 
                                            <span class="location"> 
                                                <i class="fa fa-map-marker map-icon"></i> 
                                                <?= $model->vendor->address?>
                                            </span> 
                                            <span class="rating"> 
                                            <?php
                                                    for($i = 0 ; $i < $model->vendor->rating ; $i++) {
                                                ?>
                                                    <i class="fa fa-star"></i>
                                                <?php
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <?php
                                if($i % 3 == 0 || $i == $countWishlist) {
                                    echo('</div>');
                                }
                                $i++;
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
</div>