<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\WeddingAsset;
use common\widgets\Alert;
use common\models\Category;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use frontend\assets\AppAsset;

WeddingAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="">
    <div class="header-v2 navbar-fixed-top">
        <div class="top-bar-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 top-message">
                        <p>Welcome to Wedding Planner</p>
                    </div>
                    <div class="col-md-6 top-links">
                        <ul class="listnone">
                            <?php
                                if (Yii::$app->user->isGuest) {
                            ?>
                            <li>
                                <a href="<?= Url::to(['/site/signup']); ?>">Sign Up</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/site/login']); ?>">I m couple</a>
                            </li>
                            <?php
                                } else {
                            ?>
                            <li>
                                <a href="<?= Url::to(['/site/logout']); ?>" data-method="post">Log Out</a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <!-- <div class="navbar-brand"> 
                        <a href="index.html"><img src="images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                    </div> -->
                </div>
                <div class="col-md-9">
                    <div class="navigation" id="navigation">
                        <ul>
                            <li>
                                <a href="<?= Url::to(['/site']); ?>">Home</a>
                            </li>
                            <li><a href="#" class="animsition-link">Vendor Category</a>
                                <ul>
                                    <?php
                                        $models = Category::find()->all();

                                        foreach ($models as $model) {
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]); ?>">
                                            <?= $model->category_name ?>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= Url::to(['planner/dashboard']); ?>">Planning Tools</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/site/story']); ?>">Bride Story</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/site/about'])?>">About us</a>
                                <ul>
                                    <li><a href="<?= Url::to(['/site/about'])?>">About Us</a></li>
                                    <li><a href="<?= Url::to(['/site/contact'])?>">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <!-- <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?> -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <div class="footer">
        <!-- Footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 ft-aboutus">
                    <h2>Wedding.Vendor</h2>
                    <p>At Wedding Vendor our purpose is to help people find great online network connecting wedding suppliers and wedding couples who use those suppliers. <a href="#">Start Find Vendor!</a></p>
                    <a href="#" class="btn btn-default">Find a Vendor</a> </div>
                <div class="col-md-3 ft-link">
                    <h2>Useful links</h2>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-md-4 newsletter">
                    <h2>Subscribe for Newsletter</h2>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter E-Mail Address" required>
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button">Submit</button>
            </span> </div>
                        <!-- /input-group -->
                        <!-- /.col-lg-6 -->
                    </form>
                    <div class="social-icon">
                        <h2>Be Social &amp; Stay Connected</h2>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-flickr"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Footer -->
    <div class="tiny-footer">
        <!-- Tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">Copyright © 2014. All Rights Reserved</div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
    <script type="text/javascript">
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".header-v2").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });
    </script>
</body>
</html>
<?php $this->endPage() ?>
