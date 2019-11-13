<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoVendor */

$this->title = 'Update Photo Vendor';
$this->params['breadcrumbs'][] = ['label' => 'Photo Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_photo, 'url' => ['view', 'id' => $model->id_photo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
