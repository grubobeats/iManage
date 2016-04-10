<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionSite */

$this->title = 'Update Construction Site: ' . ' ' . $model->csite_id;
$this->params['breadcrumbs'][] = ['label' => 'Construction Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->csite_id, 'url' => ['view', 'id' => $model->csite_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="construction-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
