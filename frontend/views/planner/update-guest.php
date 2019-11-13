<?php

$this->title = 'Guestlist';

?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>Update <small><?= $model->guest_name ?></small></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_form-guest', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>

