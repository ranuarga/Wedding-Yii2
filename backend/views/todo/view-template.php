<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = $model->todo_name;
$this->params['breadcrumbs'][] = ['label' => 'Template Todos', 'url' => ['template-todo']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update-template', 'id' => $model->id_todo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete-template', 'id' => $model->id_todo], [
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
            // 'id_todo',
            // 'id_user',
            'category.category_name',
            // 'id_category',
            'todo_name',
            // 'due_date',
            // 'status',
        ],
    ]) ?>

</div>
