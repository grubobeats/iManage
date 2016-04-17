<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ConstructionDiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Construction Diaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-diary-index">

    <?php
    if (Yii::$app->user->getId()) { 
    ?>



        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Construction Diary', ['create'], ['class' => 'btn btn-success']); ?>
        </p>

        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'extra3',
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
                [
                    'attribute'=>'date',
                    'value'=>'date',
                    'format'=>'raw',
                    'contentOptions'=>['style'=>'width: 200px;'],
                    'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'date',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'd.m.yyyy'
                            ],
                    ]),
                ],
                //'date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <? Pjax::end(); ?>





    <?php
    } else { 
        echo "Please, register or log in.";
    }


    ?>
    


</div>
