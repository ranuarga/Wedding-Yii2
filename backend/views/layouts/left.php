<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/> -->
                <img src="
                    <?php
                        use common\models\UserCRUD;
                        $model = UserCRUD::findOne(Yii::$app->user->identity->id);
                        if($model->user_pic) 
                            echo($model->user_pic);
                        else
                            echo($directoryAsset . '/img/default-50x50.gif');
                    ?>
                " class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#">
                    <!-- <i class="fa fa-circle text-success"></i>  -->
                    Administrator
                </a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/site']],
                    ['label' => 'Menu CRUD', 'options' => ['class' => 'header']],
                    ['label' => 'Category', 'icon' => 'list-alt', 'url' => ['/category']],
                    ['label' => 'Location', 'icon' => 'map-o', 'url' => ['/location']],
                    ['label' => 'Story Bride', 'icon' => 'book', 'url' => ['/story-bride']],
                    ['label' => 'User', 'icon' => 'users', 'url' => ['/user']],
                    ['label' => 'Todo', 'icon' => 'list', 'url' => ['/todo']],
                    ['label' => 'Vendor', 'icon' => 'industry', 'url' => ['/vendor']],
                    ['label' => 'Photo Vendor', 'icon' => 'photo', 'url' => ['/photo-vendor']],
                    ['label' => 'Wishlist', 'icon' => 'sticky-note', 'url' => ['/wishlist']],
                    ['label' => 'Guestlist', 'icon' => 'envelope', 'url' => ['/guestlist']],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
