<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ConstructionSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Construction Sites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Construction Site', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'csite_id',
            //'user_id',
            'csite_name',
            'csite_address',
            //'csite_city',
            'csite_country',
            'csite_investitor',
            // 'csite_company',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
