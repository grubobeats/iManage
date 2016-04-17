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


$cs_company = $globals->getFromDB("csite_company" , "construction_site", "csite_id", $model->csite_id);
$cs_investitor = $globals->getFromDB("csite_investitor" , "construction_site", "csite_id", $model->csite_id);
$cs_address = $globals->getFromDB("csite_address" , "construction_site", "csite_id", $model->csite_id) . ", " . $globals->getFromDB("csite_city" , "construction_site", "csite_id", $model->csite_id) . " (" . $globals->getFromDB("csite_country" , "construction_site", "csite_id", $model->csite_id) . ")";





?>
<div class="construction-diary-view">

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

    <div class="row">
        <div class="col-sm-10">
            <table class="table table-striped table-bordered detail-view">
                <tbody>
                    <tr>
                        <th colspan="4" width="100%">Day: <?= $model->extra3 ?></th>
                    </tr>
                    <tr>
                        <td width="20%">Date:</td><td width="30%"><?= $model->date ?></td>
                        <td width="20%">Weather:</td><td width="30%"><?= $model->weather . ", " . $model->temperature . " &#8451;" ?></td>
                    </tr>

                    <tr>
                        <th width="20%">Construction site:</th>
                        <th width="30%" colspan="3" ><?= $model->csite_name ?></th>
                        
                    </tr>
                    <tr>
                        <td width="20%">Investitor:</td>
                        <td width="30%"><?= $cs_investitor ?></td>
                        <td width="20%">Company:</td>
                        <td><?= $cs_company ?></td>
                    </tr>

                    <tr>
                        <td width="20%">Working hours:</td>
                        <td width="30%"><?= $model->extra1 . " h - " . $model->extra2 . " h (" . ($model->extra2 - $model->extra1) . " working hours)" ?></td>
                        <td width="20%">Workers:</td>
                        <td><?= $model->workers ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Description:</th>
                        <td colspan="3"><?= $model->description ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Issues:</th>
                        <td colspan="3"><?= $model->issues ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped table-bordered detail-view">
                <tbody>
                    <?php
                        foreach (explode(',', $model->image) as $row)
                        {
                            echo Html::a( "<tr><td align='center'><img src='" . $row . "' class='image'></td></tr>" , "@web/" . $row , [ 
                                'alt'   => 'Construction diary 2016',
                                'target'   => '_blank',
                                ] );
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2">
            <img src="http://demo.joomshaper.com/2012/neo/images/stories/demo/vertical-banner.jpg">
        </div>
    </div>
</div>
