<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Location;
use kartik\select2\Select2;

$this->title = 'Profile';

?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>
                                    Account Details 
                                    <small>
                                        Change your personal profile and wedding details
                                    </small>
                                </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-7 dashboard-form calender">
                                <div class="bg-white pinside40 mb30">
                                    <!-- Form Name -->
                                    <h2 class="form-title">Update Your Profile</h2>
                                    <?php $form = ActiveForm::begin(
                                        [
                                            'action' => ['profile'],
                                            'options' => ['enctype' => 'multipart/form-data'],
                                        ]); ?>

                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>    

                                    <?= $form->field($model,'wedding_date')->widget(
                                        DatePicker::className(), [
                                            // 'clientOptions' => ['defaultDate' => $model->wedding_date],
                                            'dateFormat' => 'yyyy-MM-dd',
                                            'options' => ['class' => 'form-control']
                                        ]
                                    ); ?>

                                    <?= $form->field($model, 'budget')->textInput() ?>

                                    <?= $form->field($model, 'file_photo')->fileInput() ?>

                                    <!-- <?= $form->field($model, 'id_location')->dropDownList(
                                            ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name'),
                                            ['prompt' => 'Select Location']
                                    ) ?> -->

                                    <?= $form->field($model, 'id_location')->widget(Select2::classname(), [
                                        'data' => ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name'),
                                        'language' => 'en',
                                        'options' => ['placeholder' => 'Select Location'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]) ?>

                                    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

                                    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

                                    <div class="form-group">
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>