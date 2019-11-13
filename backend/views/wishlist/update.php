<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wishlist */

$this->title = 'Update Wishlist: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Wishlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_wishlist, 'url' => ['view', 'id' => $model->id_wishlist]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wishlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
