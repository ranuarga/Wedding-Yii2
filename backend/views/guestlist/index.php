<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuestlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guestlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestlist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guestlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_guest',
            [
                'attribute' => 'id_user',
                'value' => 'user.username',
            ],
            'guest_name',
            'amount',
            'invitation',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
