<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\ConstructionSite;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="construction-diary-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

    

    

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'csite_id')->dropDownList(
                ArrayHelper::map(Constructionsite::find()->all(), 'csite_id', 'csite_name'),
                [
                    'prompt'=>'Choose construction site',
                    'onchange'=>'
                        console.log(document.getElementById("constructiondiary-csite_name"));
                        document.getElementById("constructiondiary-csite_name").value = $("#constructiondiary-csite_id").children("option").filter(":selected").text();
                        '
                ]
            ) ?>

            <?= $form->field($model, 'csite_name')->hiddenInput()->label(false) ?>
        </div>
        <div class="col-sm-3">
           <?= $form->field($model, 'date')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                     'inline' => false, 
                     // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
            ]);?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'weather')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'temperature')->textInput(['maxlength' => true]) ?>
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
    

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'extra1')->fileInput() ?>
    <?= $form->field($model, 'extra2')->fileInput() ?>
    <?= $form->field($model, 'extra3')->fileInput() ?>

    <?= $form->field($model, 'workers')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
