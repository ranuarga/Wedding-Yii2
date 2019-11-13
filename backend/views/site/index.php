<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalCategory ?>
                        </h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="
                        <?= Url::to(['category/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalLocation ?>
                        </h3>
                        <p>Locations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                    <a href="
                        <?= Url::to(['location/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalStoryBride ?>
                        </h3>
                        <p>Story Brides</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="
                        <?= Url::to(['story-bride/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalUserCRUD ?>
                        </h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="
                        <?= Url::to(['user/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalTodo ?>
                        </h3>
                        <p>Todos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <a href="
                        <?= Url::to(['todo/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalVendor ?>
                        </h3>
                        <p>Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-industry"></i>
                    </div>
                    <a href="
                        <?= Url::to(['vendor/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalPhotoVendor ?>
                        </h3>
                        <p>Photo Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-photo"></i>
                    </div>
                    <a href="
                        <?= Url::to(['photo-vendor/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalWishlist ?>
                        </h3>
                        <p>Wishlists</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sticky-note"></i>
                    </div>
                    <a href="
                        <?= Url::to(['wishlist/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $totalGuestlist ?>
                        </h3>
                        <p>Guestlists</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="
                        <?= Url::to(['guestlist/']);?>
                    " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</div>
