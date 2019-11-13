<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StoryBride */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Story Brides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-bride-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_story], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_story], [
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
            // 'id_story',
            'title',
            'content:ntext',
            // 'story_pic',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img($data->story_pic,
                        ['width' => '500px']);
                },
            ],
            'updated_at',
        ],
    ]) ?>

</div>
