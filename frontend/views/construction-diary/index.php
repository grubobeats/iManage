<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ConstructionDiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Construction Diaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-diary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Construction Diary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'csdiary_id',
            //'user_id',
            //'csite_id',
            'csite_name',
            'weather',
            // 'temperature',
            // 'description:ntext',
            // 'issues:ntext',
            // 'image',
            'workers',
            // 'extra1',
            // 'extra2',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
