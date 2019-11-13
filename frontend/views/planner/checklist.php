<?php

use yii\helpers\Url;

$this->title = 'Checklist';

?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>My Checklist <small>Create your wedding to do and start planning.</small></h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> 
                                <a href="<?= Url::to(['create-todo'])?>" class="btn btn-default">
                                    Add To Do
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-md-8"> -->
                <div class="col-md-12">
                <div class="todo-list-group">
                    <!-- List group -->
                        <ul class="listnone">
                            <?php
                                foreach ($todos as $model) {
                            ?>
                            <li class="todo-list-item">
                                <div class="todo-list">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="">
                                                <?php
                                                    if($model->status == 'Done') {
                                                        echo('<i class="fa fa-check"></i>');
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="todo-task">
                                                <h3 class="todo-title">
                                                    <?= $model->todo_name ?>
                                                </h3>
                                                <span class="todo-date">
                                                    <?= Yii::$app->formatter->asDate($model->due_date) ?>
                                                </span> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="todo-action">
                                                <?php
                                                    if($model->id_category) {
                                                ?>
                                                <a href="<?= Url::to(['site/vendor', 'id' => $model->id_category]) ?>" class="btn-circle" title="Recommend">
                                                    <i class="fa fa-search"></i>
                                                </a> 
                                                <?php
                                                    }
                                                ?>
                                                <a href="<?= Url::to(['update-todo', 'id' => $model->id_todo]) ?>" class="btn-circle" title="Edit list">
                                                    <i class="fa fa-edit"></i>
                                                </a> 
                                                <a href="<?= Url::to(['delete-todo', 'id' => $model->id_todo]) ?>" class="btn-circle" title="Delete List">
                                                    <i class="fa fa-trash-o"></i>
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-white pinside30 widget-todo">
                            <h3>Summary of To Dos</h3>
                            <div class="todo-percentage" data-percent="65"> </div>
                            <div class="todo-value"> <span class="todo-done">70 Done </span> <span class="todo-pending">8 To-Dos </span> </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>