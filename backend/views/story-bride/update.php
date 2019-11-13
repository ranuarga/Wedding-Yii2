<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StoryBride */

$this->title = 'Update Story Bride';
$this->params['breadcrumbs'][] = ['label' => 'Story Brides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_story]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="story-bride-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
