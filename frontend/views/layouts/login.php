<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
        $imageLink = "http://hdxwallpaperz.com/wp-content/uploads/2016/02/Architectural-Wallpaper-HjUh0.jpg";
    ?>
    <style>

        .wrap {
            background-image: url("<?php echo $imageLink; ?>");
            background-repeat: no-repeat;
            background-size: 100vw;
        }
        .login {
            text-align: center;
            background: white;
            border-radius: 5px;
            border: 1px solid black;
        }


    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; iManage.ru <?= date('Y') ?></p>

        <p class="pull-right">Developed by <a href="http://www.givemejobtoday.com">Vladan Paunovic</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
