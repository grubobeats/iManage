<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Construction

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionSite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="construction-site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'csite_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_investitor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csite_company')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
