<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = 'Create Template Todo';
$this->params['breadcrumbs'][] = ['label' => 'Template Todos', 'url' => ['template-todo']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form-template', [
        'model' => $model,
    ]) ?>
</div>
