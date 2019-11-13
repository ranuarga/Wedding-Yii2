<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\UserCRUD;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                        <img src="
                            <?php
                                $model = UserCRUD::findOne(Yii::$app->user->identity->id);
                                if($model->user_pic) 
                                    echo($model->user_pic);
                                else
                                    echo($directoryAsset . '/img/default-50x50.gif');
                            ?>" 
                        class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <?= Yii::$app->user->identity->username ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/> -->
                            <img src="
                                <?php
                                    if($model->user_pic) 
                                        echo($model->user_pic);
                                    else
                                        echo($directoryAsset . '/img/default-50x50.gif');
                                ?>
                            " class="img-circle" alt="User Image"/>
                            <p>
                                <?= Yii::$app->user->identity->username ?>
                                <small>
                                    Administrator
                                </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href=<?= Url::to(['/user/view/', 'id' => Yii::$app->user->identity->id]);?> class="btn btn-default btn-flat">
                                    Profile
                                </a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
