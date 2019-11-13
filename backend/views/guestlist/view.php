<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Guestlist */

$this->title = $model->guest_name;
$this->params['breadcrumbs'][] = ['label' => 'Guestlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_guest], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guest], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_guest',
            [
                'attribute' => 'id_user',
                'value' => $model->user->username
            ],
            'guest_name',
            'amount',
            'invitation',
            'status',
        ],
    ]) ?>

</div>
