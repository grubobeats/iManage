<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ConstructionDiary */

$this->title = 'Create Construction Diary';
$this->params['breadcrumbs'][] = ['label' => 'Construction Diaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construction-diary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
