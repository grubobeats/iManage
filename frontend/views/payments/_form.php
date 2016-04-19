<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'active')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'payment_date')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d',
                            ],
                    ]);?>

    <?= $form->field($model, 'payment_expire_on')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d',
                            ],
                    ]);?>

    <?= $form->field($model, 'paid_by')->dropDownList(['Credit Card' => 'Credit card', 'Yandex dengi' => 'Yangex dengi', 'QIWI' => 'QIWI wallet', 'PayPal' => 'Paypal' ]) ?>

    <?= $form->field($model, 'paid_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
