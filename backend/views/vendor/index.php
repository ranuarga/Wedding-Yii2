<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_vendor',
            'vendor_name',
            [
                'attribute' => 'id_category',
                'value' => 'category.category_name',
            ],
            'address',
            [
                'attribute' => 'id_location',
                'value' => 'location.location_name',
            ],
            //'email:email',
            //'phone',
            //'website',
            //'content:ntext',
            //'max_price',
            //'min_price',
            //'quantity',
            //'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
