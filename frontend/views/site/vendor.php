<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use common\models\PhotoVendor;
use common\models\Location;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = $category->category_name;

?>
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <!-- <div class="icon-circle">
                        <i class="fa fa-dungeon"></i>
                    </div> -->
                    <h1>
                        Wedding 
                        <?= $category->category_name ?> 
                        Listing
                    </h1>
                    <p>
                        Find the perfect wedding <?= strtolower($category->category_name) ?> 
                        vendor for your wedding. 
                        Search wedding reception <?= strtolower($category->category_name) ?> 
                        vendors in your area.
                    </p>
                    <span class="label label-default">
                        <?= $vendorsCount ?>
                        <?= $category->category_name ?>
                        Vendor
                    </span>
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
                    <li class="active">
                        Wedding 
                        <?= $category->category_name ?> 
                        Listing
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-3">
                <div class="filter-sidebar">
                    <div class="col-md-12 form-title">
                        <h2>Refine Your Search</h2> 
                    </div>
                    <?php $form = ActiveForm::begin([
                        'action' => ['vendor', 'id' => $category->id_category],
                        'method' => 'get',
                    ]); ?>
                        <div class="col-md-12 form-group">
                            <?= $form->field($searchModel, 'id_location')->dropDownList(
                                ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name'),
                                ['prompt' => 'Select Location']
                            ) ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <?= $form->field($searchModel, 'min_price') ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <?= $form->field($searchModel, 'max_price') ?>
                        </div>

                        <div class="col-md-12 form-group rating">
                            <?= $form->field($searchModel, 'rating')
                                    ->radioList(
                                        [ 
                                            1 => '<i class="fa fa-star"></i>',
                                            2 => '<i class="fa fa-star"></i><i class="fa fa-star"></i>',
                                            3 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
                                            4 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
                                            5 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>'
                                        ], 
                                        [
                                            'item' => function($index, $label, $name, $checked, $value) {
            
                                                $return = '<div >';
                                                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="">';
                                                $return .= '<label>' . $label . '</label>';
                                                $return .= '</div>';
            
                                                return $return;
                                            }
                                        ]
                            ) ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                    $i = 1;
                    foreach ($vendors as $model) {
                        if($i % 3 == 1) {
                            echo ('<div class="row">');
                        }
                ?>
                    <div class="col-md-4 vendor-box">
                        <!-- venue box start-->
                        <div class="vendor-image">
                            <!-- venue pic -->
                            <a href="<?= Url::to(['site/view-vendor', 'id' => $model->id_vendor]); ?>">
                                <img src="
                                    <?php
                                        $photo = PhotoVendor::find()
                                            ->where(['id_vendor' => $model->id_vendor])
                                            ->one();
                                        if(isset($photo->photo)){
                                            echo $photo->photo;
                                        }
                                    ?>
                                " alt="wedding venue" class="img-responsive">
                            </a>
                            <div class="favourite-bg">
                                <a href="<?= Url::to(['site/wish', 'id' => $model->id_vendor]); ?>" class="">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.venue pic -->
                        <div class="vendor-detail">
                            <!-- venue details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2>
                                    <a href="<?= Url::to(['site/view-vendor', 'id' => $model->id_vendor]); ?>" class="title">
                                        <?= $model->vendor_name ?>
                                    </a>
                                </h2>
                                <p class="location">
                                    <i class="fa fa-map-marker"></i> 
                                    <?= $model->address?>
                                </p>
                                <div class="rating "> 
                                    <?php
                                        for($star = 0 ; $star < $model->rating ; $star++) {
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
                                <?= Yii::$app->formatter->asCurrency($model->min_price) ?>
                                    -
                                <?= Yii::$app->formatter->asCurrency($model->max_price) ?>
                                </div>
                            </div>
                        </div>
                        <!-- venue details -->
                    </div>
                    <?php
                        if($i % 3 == 0 || $i == $vendorsCount) {
                            echo ('</div>');
                        }
                        $i++;
                        }
                    ?>
                <div class="row">
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
        </div>
    </div>
</div>        