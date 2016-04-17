<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\ConstructionSite;
use frontend\models\UploadForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Globals;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $globals = new Globals;
    // returns last working day as integer
    $day_value = $globals->doQuery(
        'SELECT `extra3` 
        FROM `construction_diary`
        WHERE `csdiary_id` 
            = ( SELECT max(csdiary_id) FROM `construction_diary`) 
            AND `user_id` = "' . Yii::$app->user->getId() . '" ',
        0) + 1;

    $date_today = $globals->dateToday();
    echo $date_today;
?>

<div class="row">
    <div class="col-sm-8">
        <div class="construction-diary-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($model, 'csite_id')->dropDownList(
                        ArrayHelper::map(Constructionsite::find()->all(), 'csite_id', 'csite_name'),
                        [
                            'prompt'=>'Construction site',
                            'onchange'=>'
                                document.getElementById("constructiondiary-csite_name").value = $("#constructiondiary-csite_id").children("option").filter(":selected").text();
                                '
                        ]
                    ) ?>

                    <?= $form->field($model, 'csite_name')->hiddenInput()->label(false) ?>
                </div>
                <div class="col-sm-3">
                   <?= $form->field($model, 'date')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d',
                            ],
                    ]);?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'weather')->dropDownList(
                        [
                            'Rainy' => 'Rainy',
                            'Stormy' => 'Stormy',
                            'Sunny' => 'Sunny',
                            'Cloudy' => 'Cloudy',
                            'Foggy' => 'Foggy',
                            'Hot' => 'Hot',
                            'Cold' => 'Cold',
                            'Windy' => 'Windy',
                        ],
                        ['prompt' => 'Select weather']
                        ) ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'temperature')->textInput(['maxlength' => true, 'placeholder' => 'Enter temperature']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($model, 'extra3')->textInput(['maxlength' => true, 'value' => $day_value, 'placeholder' => 'Working day of construction site' ]) ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'workers')->textInput(['maxlength' => true, 'placeholder' => 'Number of worker you had today']) ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'extra1')->dropDownList( 
                        [   
                            '07' => '07 h',
                            '08' => '08 h',
                            '09' => '09 h',
                            '10' => '10 h',
                            '11' => '11 h',
                            '12' => '12 h',
                            '13' => '13 h',
                            '14' => '14 h',
                            '15' => '15 h',
                            '16' => '16 h',
                            '17' => '17 h',
                            '18' => '18 h',
                            '19' => '19 h',
                            '20' => '20 h',
                            '21' => '21 h',
                            '22' => '22 h',
                            '23' => '23 h',
                            '00' => '00 h',
                            '01' => '01 h',
                            '02' => '02 h',
                            '03' => '03 h',
                            '04' => '04 h',
                            '05' => '05 h',
                            '06' => '06 h',
                        ], ['prompt'=>'Select time']) ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'extra2')->dropDownList( 
                        [
                            '07' => '07 h',
                            '08' => '08 h',
                            '09' => '09 h',
                            '10' => '10 h',
                            '11' => '11 h',
                            '12' => '12 h',
                            '13' => '13 h',
                            '14' => '14 h',
                            '15' => '15 h',
                            '16' => '16 h',
                            '17' => '17 h',
                            '18' => '18 h',
                            '19' => '19 h',
                            '20' => '20 h',
                            '21' => '21 h',
                            '22' => '22 h',
                            '23' => '23 h',
                            '00' => '00 h',
                            '01' => '01 h',
                            '02' => '02 h',
                            '03' => '03 h',
                            '04' => '04 h',
                            '05' => '05 h',
                            '06' => '06 h',
                        ], ['prompt'=>'Select time']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'issues')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            

            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

            

            

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>