<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = 'Update Template Todo';
$this->params['breadcrumbs'][] = ['label' => 'Template Todos', 'url' => ['template-todo']];
$this->params['breadcrumbs'][] = ['label' => $model->todo_name, 'url' => ['view-template', 'id' => $model->id_todo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-template', [
        'model' => $model,
    ]) ?>

</div>
