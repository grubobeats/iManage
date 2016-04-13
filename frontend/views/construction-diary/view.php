<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */

$this->title = $model->csdiary_id;
$this->params['breadcrumbs'][] = ['label' => 'Construction Diaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-diary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->csdiary_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->csdiary_id], [
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
            'csdiary_id',
            'user_id',
            'csite_id',
            'csite_name',
            'date',
            'weather',
            'temperature',
            'description:ntext',
            'issues:ntext',
            'workers',
            'image',
            'extra1',
            'extra2',
            'extra3',
        ],
        
    ]) ?>

    <?= DetailView::widget(['model' => $model, 'attributes' => ['extra3',],]) ?>

</div>
