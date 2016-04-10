<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionSiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="construction-site-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'csite_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'csite_name') ?>

    <?= $form->field($model, 'csite_address') ?>

    <?= $form->field($model, 'csite_city') ?>

    <?php // echo $form->field($model, 'csite_country') ?>

    <?php // echo $form->field($model, 'csite_investitor') ?>

    <?php // echo $form->field($model, 'csite_company') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
