<?php

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
                                <h1>Create To Do</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_form-todo', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
