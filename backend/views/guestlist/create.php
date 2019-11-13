<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Guestlist */

$this->title = 'Create Guestlist';
$this->params['breadcrumbs'][] = ['label' => 'Guestlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
