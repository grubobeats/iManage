<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="construction-diary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'csdiary_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'csite_id') ?>

    <?= $form->field($model, 'csite_name') ?>

    <?= $form->field($model, 'weather') ?>

    <?php // echo $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'issues') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'workers') ?>

    <?php // echo $form->field($model, 'extra1') ?>

    <?php // echo $form->field($model, 'extra2') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
