<?php
use yii\helpers\Url;
use common\models\PhotoVendor;
use common\widgets\Alert;

$this->title = $model->vendor_name;

?>
<div id="slider" class="owl-carousel owl-theme slider">
    <?php
        foreach ($photos as $photo) {
    ?>
    <div class="item">
        <div class="slider-pic">
            <img src="<?= $photo->photo ?>" alt="">
        </div>
    </div>
    <?php
        }
    ?>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= Url::to(['site/']); ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]); ?>">
                            <?= $model->category->category_name ?>
                        </a>
                    </li>
                    <li class="active">
                        <?= $model->vendor_name ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container venue-header">
    <div class="row venue-head">
        <div class="col-md-12 title"> 
            <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]); ?>" class="label-primary">
                <?= $model->category->category_name ?>
            </a>
            <h1>
                <?= $model->vendor_name ?>
            </h1>
            <p class="location">
                <i class="fa fa-map-marker"></i>
                <?= $model->address?>
            </p>
        </div>
        <div class="col-md-8 rating-box">
            <div class="rating "> 
                <?php
                    for($i = 0 ; $i < $model->rating ; $i++) {
                ?>
                    <i class="fa fa-star"></i>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="col-md-4 venue-action"> 
            <a href="<?= Url::to(['site/wish', 'id' => $model->id_vendor]); ?>" class="btn btn-primary">
                ADD TO WISHLIST
            </a> 
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-8 page-description">
                <div class="venue-details">
                    <?= Yii::$app->formatter->asNText($model->content) ?>
                </div>
            </div>
            <div class="col-md-4 page-sidebar">
                <div class="row">
                    <div class="col-md-12">
                        <div class="venue-info">
                            <!-- venue-info-->
                            <div class="pricebox">
                                <div>Min Price</div>
                                <span class="price">
                                    <?= Yii::$app->formatter->asCurrency($model->min_price) ?>
                                </span> 
                            </div>
                            <div class="pricebox">
                                <div>Max Price</div>
                                <span class="price">
                                    <?= Yii::$app->formatter->asCurrency($model->max_price) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="profile-sidebar well-box">
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    <h2>
                                        <?= $model->vendor_name ?>
                                    </h2>
                                </div>
                                <div class="profile-address"> 
                                    <i class="fa fa-map-marker"></i> 
                                    <?= $model->address ?>
                                </div>
                                <div class="profile-website">
                                    <i class="fa fa-envelope"></i> 
                                    <?= Yii::$app->formatter->asEmail($model->email) ?>
                                </div>
                                <div class="profile-website">
                                    <i class="fa fa-link"></i> 
                                    <?= Yii::$app->formatter->asUrl($model->website) ?>
                                </div>
                                <div class="profile-website">
                                    <i class="fa fa-phone"></i> 
                                    <?= $model->phone ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-space60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb30">
                <h1>Recommended Vendor for You</h1>
            </div>
            <?php
                foreach ($recommends as $recommend) {
            ?>
            <div class="col-md-4 vendor-box">
                <!-- venue box start-->
                <div class="vendor-image">
                    <!-- venue pic -->
                    <a href="<?= Url::to(['site/view-vendor', 'id' => $recommend->id_vendor]); ?>">
                        <img src="
                            <?php
                                $photo = PhotoVendor::find()
                                    ->where(['id_vendor' => $recommend->id_vendor])
                                    ->one();
                                if(isset($photo->photo)){
                                    echo $photo->photo;
                                }
                            ?>
                        " alt="wedding venue" class="img-responsive">
                    </a>
                </div>
                <!-- /.venue pic -->
                <div class="vendor-detail">
                    <!-- venue details -->
                    <div class="caption">
                        <!-- caption -->
                        <h2>
                            <a href="<?= Url::to(['site/view-vendor', 'id' => $recommend->id_vendor]); ?>" class="title">
                                <?= $recommend->vendor_name ?>
                            </a>
                        </h2>
                        <p class="location">
                            <i class="fa fa-map-marker"></i> 
                            <?= $recommend->address ?>
                        </p>
                        <div class="rating">
                        <?php
                            for($i = 0 ; $i < $model->rating ; $i++) {
                        ?>
                            <i class="fa fa-star"></i>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    <!-- /.caption -->
                    <div class="vendor-price">
                        <div class="price"> 
                            <?= Yii::$app->formatter->asCurrency($recommend->min_price) ?>
                            - 
                            <?= Yii::$app->formatter->asCurrency($recommend->max_price) ?>
                        </div>
                    </div>
                </div>
                <!-- venue details -->
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>