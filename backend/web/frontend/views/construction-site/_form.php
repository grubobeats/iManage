<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionSite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="construction-site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'csite_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_investitor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_developer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_started')->textInput() ?>

    <?= $form->field($model, 'company_created_date')->textInput() ?>

    <?= $form->field($model, 'csite_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
