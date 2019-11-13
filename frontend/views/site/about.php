<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'About';
?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <!-- <div class="icon-circle"> <i class="icon icon-size-60 icon-loving-home icon-white"></i> </div> -->
                    <h1>About Wedding Vendor</h1>
                    <p>
                        The most complete list of wedding vendors in all major cities of Indonesia that is needed to prepare the bride's wedding party.
                    </p>
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
                    <li class="active">
                        About Wedding Vendor
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 side-nav" id="leftCol">
                <div class="hide-side">
                    <ul class="listnone nav" id="sidebar">
                        <li class="active"><a href="#aboutus">About us</a></li>
                        <li><a href="#team">Meet The Team</a></li>
                        <li><a href="#howwork">How it works</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 content-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aboutus" id="aboutus">
                            <h1>We are Weddings Finder.</h1>
                            <p class="lead">
                                Welcome to our wedding vendor, launch in 2019. We pride our selves on being a trusted friend someone to take on this journey with you making it fun from the start.
                            </p>
                            <p>
                                We will support you and advise you. We are never short of suggestions or inspiring ideas.Our matchless, which makes finding beautiful wedding venue easier and one less thing for you to worry about.With our inspir blog, suggestions and sensational offers, no one understands weddings better than we do.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="call-to-action well-box mt30">
                            <h1>
                                Online Wedding Planning 
                            </h1>
                            <h3 class="point">
                                Advice &amp; Guide. | Save your date. | Forever free.
                            </h3>
                            <img src="wedding/images/cycle-graphic.png" alt="" class="graphic img-responsive"> 
                                <a href="<?= Url::to(['planner/dashboard']); ?>" class="btn btn-default btn-lg">
                                    Get start today
                                </a> </div>
                        </div>
                        <div class="col-md-12 team-section" id="team">
                            <h1>Our Founder</h1>
                            <div class="row team-section">
                                <div class="col-md-3 text-center team-block">
                                    <div class="team-pic">
                                        <!-- team pic -->
                                        <a href="#"><img src="wedding/images/founder1.jpg" class="img-responsive" alt=""></a>
                                    </div>
                                    <!-- /.team pic -->
                                    <h2><a href="#">Ranu Arga</a></h2>
                                    <span>Web Developer</span>
                                    <div class=""> <a href="https://twitter.com/AugustArga"><i class="fa fa-twitter-square"></i></a> <a href="https://www.linkedin.com/in/ranu-arga/"><i class="fa fa-linkedin-square"></i></a> </div>
                                </div>
                                <div class="col-md-3 text-center team-block">
                                    <div class="team-pic">
                                        <!-- team pic -->
                                        <a href="#"><img src="wedding/images/founder3.jpg" class="img-responsive" alt=""></a>
                                    </div>
                                    <!-- /.team pic -->
                                    <h2><a href="#">Odelia Salsabila</a></h2>
                                    <span>Web Developer</span>
                                    <div class=""> <a href="https://twitter.com/odeliasalsabila"><i class="fa fa-twitter-square"></i></a> <a href="https://id.linkedin.com/in/odelia-salsabila-950b65162"><i class="fa fa-linkedin-square"></i></a> </div>
                                </div>
                                <div class="col-md-3 text-center team-block">
                                    <div class="team-pic">
                                        <!-- team pic -->
                                        <a href="#"><img src="wedding/images/founder4.jpg" class="img-responsive" alt=""></a>
                                    </div>
                                    <!-- /.team pic -->
                                    <h2><a href="#">Pramudita</a></h2>
                                    <span>Content Writer</span>
                                    <div class=""> <a href="https://twitter.com/Prathama29N"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> </div>
                                </div>
                                <div class="col-md-3 text-center team-block">
                                    <div class="team-pic">
                                        <!-- team pic -->
                                        <a href="#"><img src="wedding/images/founder2.jpg" class="img-responsive" alt=""></a>
                                    </div>
                                    <!-- /.team pic -->
                                    <h2><a href="#">Firyal Zahwa</a></h2>
                                    <span>Content Writer</span>
                                    <div class=""> <a href="https://twitter.com/zahwasalsabil13"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 how-it-works" id="howwork">
                            <h1>How It Works</h1>
                            <p>Things you need to know how our application works.</p>
                            <div class="row">
                                <div class="col-md-6 how-it-desc">
                                    <h2>Find the Vendor</h2>
                                    <p>You can find thousands of local wedding vendors without registering to be our member. Browse by rating, and prices that fits with your budget to find the best wedding services.</p>
                                </div>
                                <div class="col-md-4 text-center how-it-icon"> <img src="wedding/images/vendor-1.svg" alt=""> </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-center how-it-icon"> <img src="wedding/images/list.svg" alt=""> </div>
                                <div class="col-md-6 how-it-desc">
                                    <h2>Create Your Planning Checklist</h2>
                                    <p>Before using this feature, you are required to register as our member. Next you can write down some of the planning tools we provide such as to do list, budget, guest list, etc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>