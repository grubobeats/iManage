<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use frontend\models\ConstructionSite;
use frontend\models\Globals;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */

$this->title = $model->csdiary_id;
$this->params['breadcrumbs'][] = ['label' => 'Construction Diaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$globals = new Globals();
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
            'extra3',
            'csdiary_id',
            'csite_name',
            [
                'attribute'=>'Company',
                'value'=> $globals->getFromDB("csite_company" , "construction_site", "csite_id", $model->csite_id),
            ],
            [
                'attribute'=>'Investitor',
                'value'=> $globals->getFromDB("csite_investitor" , "construction_site", "csite_id", $model->csite_id),
            ],
            [
                'attribute'=>'City',
                'value'=> $globals->getFromDB("csite_city" , "construction_site", "csite_id", $model->csite_id),
            ],
            [
                'attribute'=>'Address',
                'value'=> $globals->getFromDB("csite_address" , "construction_site", "csite_id", $model->csite_id),
            ],
            [
                'attribute'=>'Country',
                'value'=> $globals->getFromDB("csite_country" , "construction_site", "csite_id", $model->csite_id),
            ],
            'date:date',
            'weather',
            [
                'attribute'=>'Temperature',
                'value'=> $model->temperature . " degrees",
            ],
            'description:ntext',
            'issues:ntext',
            'workers',
            [
                'attribute'=>'Started at time',
                'value'=> $model->extra1 . " h",
            ],
            [
                'attribute'=>'Finished at time',
                'value'=> $model->extra2 . " h",
            ],
            
        ],

    ]) ?>

    <?php
        foreach (explode(',', $model->image) as $row)
        {
            echo Html::img(Yii::getAlias('@web') . '/' . $row, [ 'id' => $row, 'alt' => 'This is alt','width' => '150', 'style' => 'margin:20px; ', 'class' => 'text-center']);
        }
    ?>


</div>
