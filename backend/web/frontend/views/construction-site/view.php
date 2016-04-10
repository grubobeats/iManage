<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionSite */

$this->title = $model->csite_id;
$this->params['breadcrumbs'][] = ['label' => 'Construction Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-site-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->csite_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->csite_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'csite_id',
            'csite_name',
            'csite_address',
            'csite_investitor',
            'csite_developer',
            'csite_started',
            'company_created_date',
            'csite_status',
            'user_id',
        ],
    ]) ?>

</div>
