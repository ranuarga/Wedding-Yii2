<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PhotoVendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photo Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_photo',
            // 'id_vendor',
            [
                'attribute' => 'id_vendor',
                'value' => 'vendor.vendor_name'
            ],
            // 'photo',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($model) {
                    return Html::img($model->photo,
                        ['width' => '500px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
