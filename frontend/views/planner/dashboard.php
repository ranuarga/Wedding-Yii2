<?php
    $this->title = 'Dashboard';
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>My Dashboard <small>Welcome!</small></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- wedding days block -->
                <div class="bg-white pinside40 mb30">
                    <h4>Wedding days to go</h4>
                    <div class="wd-days-count mb40 mt40">
                        <h1 class="title-number">
                            <?php
                                $dateNow = new DateTime('now', new DateTimeZone('WIB'));
                                echo $dateNow->diff(new DateTime($model->wedding_date))->days;
                            ?>
                        </h1>
                    </div>
                    <div><?= Yii::$app->formatter->asDate($model->wedding_date) ?></div>
                </div>
            </div>
            <!-- wedding days block -->
            <div class="col-md-4">
                <!-- wedding budget block -->
                <div class="bg-white pinside40 mb30">
                    <h4>Your Budget</h4>
                    <div class="wd-days-count mb40 mt40">
                        <h1 class="title-number">
                            <?= Yii::$app->formatter->asInteger($model->budget) ?>
                        </h1>
                    </div>
                    <div>
                        Spending Estimation 
                        <?= Yii::$app->formatter->asCurrency($minSpend) ?>
                        -
                        <?= Yii::$app->formatter->asCurrency($maxSpend) ?>
                    </div>
                </div>
            </div>
            <!-- wedding budget block -->
            <div class="col-md-4">
                <!-- wedding budget block -->
                <div class="bg-white pinside40 mb30">
                    <h4>Checklist - todos</h4>
                    <div class="wd-days-count mb40 mt40">
                        <h1 class="title-number">
                            <?= $allTodos ?>
                        </h1>
                    </div>
                    <div>Completed <?= $done ?> of <?= $allTodos ?> checklist items</div>
                </div>
            </div>
            <!-- wedding budget block -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- wedding wishlist block -->
                <div class="bg-white pinside40 mb30">
                    <h4>Wishlist Item</h4>
                    <div class="wd-days-count mb40 mt40">
                        <h1 class="title-number">
                            <?= $countWishlist ?>
                        </h1>
                    </div>
                    <div>Add more item. Compare &amp; Finalize</div>
                </div>
            </div>
            <!-- wedding wishlist block -->
            <div class="col-md-4">
                <!-- wedding budget block -->
                <div class="bg-white pinside40 mb30">
                    <h4>Invited guests</h4>
                    <div class="wd-days-count mb40 mt40">
                        <h1 class="title-number">
                            <?= $countGuest ?>
                        </h1>
                    </div>
                    <div class="guest-status">
                        <span class="invite-accepted">
                            <?= $accepted ?> accepted
                        </span> | 
                        <span class="invite-descline">
                            <?= $declined ?> declined
                        </span> | 
                        <span class="invite-noresponse">
                            <?= $notResponded ?> not responded
                        </span>
                    </div>
                </div>
            </div>
            <!-- wedding budget block -->
        </div>
    </div>
</div>