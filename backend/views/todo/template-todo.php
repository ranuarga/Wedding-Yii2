<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Template Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Template', ['create-template'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All Todos', ['index'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_todo',
            // 'id_user',
            [
                'attribute' => 'id_category',
                'value' => 'category.category_name'
            ],
            'todo_name',
            // 'due_date'
            // 'status',
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{leadView} {leadUpdate} {leadDelete}',
                'buttons'  => [
                    'leadView'   => function ($url, $model) {
                        $url = Url::to(['todo/view-template', 'id' => $model->id_todo]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
                    },
                    'leadUpdate' => function ($url, $model) {
                        $url = Url::to(['todo/update-template', 'id' => $model->id_todo]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
                    },
                    'leadDelete' => function ($url, $model) {
                        $url = Url::to(['todo/delete-template', 'id' => $model->id_todo]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                        ]);
                    },
                ]
            ],
    ]]); ?>
</div>
