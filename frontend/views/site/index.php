<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="slider-bg">
        <!-- slider start-->
        <div id="slider" class="owl-carousel owl-theme slider">
            <div class="item slider-shade"><img src="wedding/images/slider-5.jpg" alt="Wedding couple just married"></div>
            <div class="item slider-shade"><img src="wedding/images/slider-4 (2).jpg" alt="Wedding couple just married"></div>
            <div class="item slider-shade"><img src="wedding/images/slider-6 (2).jpg" alt="Wedding couple just married"></div>
        </div>
        <div class="find-section">
            <!-- Find search section-->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 finder-block">
                        <div class="finder-caption">
                            <h1>Plan and Book Your Wedding</h1>
                            <p>Over <strong>1200+ Wedding Vendor </strong>for you special date &amp; Find the perfect venue &amp; save your date</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Find search section-->
    </div>
    <!-- slider end-->
<div class="section-space80">
        <!-- Feature Blog Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Plan your wedding one step at a time</h1>
                        <p>Simple wedding planning tools to help you stay on track</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- feature center -->
                <div class="col-md-4">
                    <div class="feature-block feature-center mb30">
                        <!-- feature block -->
                        <div class="feature-icon"> <i class="fas fa-tasks"></i></div>
                        <h2>Checklist</h2>
                        <p>Get your planning sorted with our free wedding planning checklist!</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center mb30">
                        <!-- feature block -->
                        <div class="feature-icon"> <i class="fas fa-money-check-alt"></i></div>
                        <h2>Budget Planner</h2>
                        <p>Budget estimator tool that lets you specify your program plan</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center mb30">
                        <!-- feature block -->
                        <div class="feature-icon"><i class="fas fa-user-friends"></i></div>
                        <h2>Guest list</h2>
                        <p>Build your free wedding guest list</p>
                    </div>
                </div>
            </div>
            <!-- /.feature center -->
            <div class="row">
                <div class="col-md-12 text-center"> 
                    <a href="<?= Url::to(['planner/dashboard'])?>" class="btn btn-primary">
                        Get Started
                    </a> 
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Blog End -->
    <div class="section-space80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>More than 2,000 Wedding Vendors</h1>
                        <p> Choose the most suitable option for your dream wedding </p>
                    </div>
                </div>
            </div>
            <?php
                $i = 1;
                foreach ($categories as $model) {
                    if($i%3 == 1) {
                        echo('<div class="row">');
                    } 
            ?>
                <div class="col-md-4">
                    <div class="vendor-total-list mb30">
                        <!-- vendor-total-list -->
                        <div class="vendor-total-thumb">
                            <!-- vendor-total-thumb -->
                            <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]); ?>">
                                <!-- <img src="<?= $model->category_pic?>" class="img-responsive" alt=""> -->
                                <img src="<?= $model->category_pic ?>" class="img-responsive" alt="">
                            </a>
                        </div>
                        <!-- /.vendor-total-thumb -->
                        <div class="well-box vendor-total-info">
                            <!-- vendor-total-info -->
                            <h2 class="vendor-total-title">
                                <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]); ?>" class="title">
                                    <?= $model->category_name ?>
                                </a>
                            </h2>
                        </div>
                        <!-- /.vendor-total-info -->
                    </div>
                    <!-- /.vendor-total-list -->
                </div>
            <?php
                    if($i%3 == 0 || $i == $count) {
                        echo('</div>');
                    }
                    $i++;
                }
            ?>
        </div>
    </div>
    <div class="section-space80">
        <!-- Real Weddings -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Be inspired by Real Weddings</h1>
                        <p>Get inspirations from our wedding ideas, real wedding stories, and notable wedding</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach ($stories as $model) {
                ?>
                <div class="col-md-4">
                    <div class="real-wedding-block mb30">
                        <!-- real wedding block -->
                        <div class="real-wedding-img">
                        <a href="<?= Url::to(['site/view-story', 'id' => $model->id_story]); ?>">
                                <img src="<?= $model->story_pic ?>" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="real-wedding-info well-box text-center">
                            <h2 class="real-wedding-title">
                            <a href="<?= Url::to(['site/view-story', 'id' => $model->id_story]); ?>" class="title">
                                    <?= $model->title ?> 
                                </a>
                            </h2>
                            <p class="real-wed-meta">
                                <span class="wed-day-meta">
                                    <?= Yii::$app->formatter->asDate($model->updated_at) ?> 
                                </span> 
                            </p>
                        </div>
                    </div>
                    <!-- /.real wedding block -->
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?= Url::to(['site/story']); ?>" class="btn btn-default btn-lg">
                        View More Inspirations                        
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Real Weddings -->
    <section class="module parallax parallax-2">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 parallax-caption">
                    <h2>Are you trying our planning tools ?</h2>
                    <p>Here is a planning tool that lets you create a workspace you love to organized your upcoming wedding</p>
                    <a href="<?= Url::to(['planner/dashboard'])?>" class="btn btn-primary">
                        Start Planning Today
                    </a> 
                </div>
            </div>
        </div>
    </section>
    <div class="section-space80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Most Reason to Why Choose us</h1>
                        <p>Here are 3 reasons why we’ve gained a reputation as a reliable company</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="well-box feature-block text-center">
                        <div class="feature-icon"><i class="fas fa-heart"></i></div>
                        <div class="feature-info">
                            <h3>20 Years Experiance</h3>
                            <p>We are never short of suggestions or inspiring ideas.We will support you and advise you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well-box feature-block text-center">
                        <div class="feature-icon"><i class="fas fa-stream"></i></div>
                        <div class="feature-info">
                            <h3>100 real weddings</h3>
                            <p>Every wedding is unique and has a special story. Share all the details of your special moments</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well-box feature-block text-center">
                        <div class="feature-icon"><i class="fas fa-synagogue"></i></div>
                        <div class="feature-info">
                            <h3>1500 + Wedding Suppliers</h3>
                            <p>Many suppliers such as venues, catering, wedding dresses, and many more are provided for recommendations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>