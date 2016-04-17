<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */

$this->title = 'Update Construction Diary: ' . ' ' . $model->csdiary_id;
$this->params['breadcrumbs'][] = ['label' => 'Construction Diaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->csdiary_id, 'url' => ['view', 'id' => $model->csdiary_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="construction-diary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php
        foreach (explode(',', $model->image) as $row)
        {
            echo Html::img(Yii::getAlias('@web') . '/' . $row, [ 'id' => $row, 'alt' => 'This is alt','width' => '150']);
        }
    ?>
</div>
