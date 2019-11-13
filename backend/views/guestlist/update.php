<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Guestlist */

$this->title = 'Update Guestlist';
$this->params['breadcrumbs'][] = ['label' => 'Guestlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->guest_name, 'url' => ['view', 'id' => $model->id_guest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guestlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
