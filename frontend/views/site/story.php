<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = 'Bride Story';
?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Bride Story</h1>
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
                    <li class="active">Bride Story</li>
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
                    <?php
                        foreach ($models as $model) {
                    ?>
                    <!-- blog holder -->
                    <div class="col-md-12 post-holder">
                        <div class="well-box">
                            <div class="post-image">
                                <a href="<?= Url::to(['site/view-story', 'id' => $model->id_story]); ?>">
                                    <img src="<?= $model->story_pic ?>" class="img-responsive" alt="">
                                </a>
                            </div>
                            <h1 class="post-title">
                                <a href="<?= Url::to(['site/view-story', 'id' => $model->id_story]); ?>">
                                    <?= $model->title ?>
                                </a></h1>
                            <div class="post-meta"> 
                                <span class="date-meta">
                                    ON <?= Yii::$app->formatter->asDate($model->updated_at) ?>
                                </span> 
                            </div>
                            <p>
                                <?php
                                    $array = explode('.', $model->content);
                                    echo($array[0] . "." . $array[1] . "." . $array[2] . "...");
                                ?>
                            </p>
                            <a href="<?= Url::to(['site/view-story', 'id' => $model->id_story]); ?>" class="btn btn-default">
                                Read More
                            </a>
                        </div>
                    <!-- /.blog holder -->
                    </div>
                    <?php
                        }
                    ?>
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
            <div class="col-md-4 right-sidebar">
                    <!-- right sidebar -->
                    <div class="row">
                        <div class="col-md-12 widget widget-search">    
                            <!-- widget -->
                            <div class="well-box">
                                <h2 class="widget-title">Search bar</h2>
                                <div class="">
                                    <?php $form = ActiveForm::begin([
                                        'action' => ['story'],
                                        'method' => 'get',
                                    ]); ?>
                                        <?= $form->field($searchModel, 'title')->label(false) ?>
                                        <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary btn-lg']) ?>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.widget -->
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
                                            <a href="<?= Url::to(['site/view-story', 'id' => $recent->id_story]); ?>">
                                                <img src="<?= $recent->story_pic ?>" class="img-responsive" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="rc-post col-md-7">
                                        <h3>
                                            <a href="<?= Url::to(['site/view-story', 'id' => $recent->id_story]); ?>" class="link">
                                                <?= $recent->title ?>
                                            </a>
                                        </h3>
                                        <div class="post-meta"> 
                                            <span class="date-meta">
                                                ON <?= Yii::$app->formatter->asDate($recent->updated_at) ?>
                                            </span> 
                                        </div>
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