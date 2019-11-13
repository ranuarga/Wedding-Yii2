<?php
use yii\helpers\Url;

$this->title = $model->title;

?>
<div class="wide-post-image"> 
    <img src="<?= $model->story_pic?>" alt="" class="img-responsive center"> 
</div>
<div class="container blog-header">
    <div class="row blog-head">
        <div class="col-md-12 title">
            <h1>
                <?= $model->title ?>
            </h1>
            <div class="post-meta"> 
                <span class="date-meta">
                    ON <?= $model->updated_at ?>
                </span> 
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
                    <li>
                        <a href="
                            <?= Url::to(['site/story']); ?>
                        ">Bride Story</a>
                    </li>
                    <li class="active"><?= $model->title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 content-left">
                <!-- content left -->
                <div class="row">
                    <div class="col-md-12 post-holder">
                        <!-- blog holder -->
                        <div class="post-area">
                            <?= Yii::$app->formatter->asNText($model->content) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 right-sidebar">
                    <!-- right sidebar -->
                    <div class="row">
                        <div class="col-md-12 widget widget-recent-post">
                            <!-- widget -->
                            <div class="well-box">
                                <h2 class="widget-title">Recent Posts</h2>
                                <?php
                                    foreach ($recents as $recent) {
                                ?>
                                <div class="rc-post-holder row">
                                    <div class="col-md-5">
                                        <div class="post-image">
                                            <a href="#"><img src="<?= $recent->story_pic ?>" class="img-responsive" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="rc-post col-md-7">
                                        <h3><a href="#" class="link"><?= $recent->title ?></a></h3>
                                        <div class="post-meta"> <span class="date-meta">ON <?= $recent->updated_at?></span> </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>