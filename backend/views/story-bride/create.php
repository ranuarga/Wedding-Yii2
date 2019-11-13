<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StoryBride */

$this->title = 'Create Story Bride';
$this->params['breadcrumbs'][] = ['label' => 'Story Brides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-bride-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
