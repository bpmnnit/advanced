<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            //'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/offdpr/index']],
    // ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Offshore Proj', 'url' => ['/offproj/index']];
        $menuItems[] = ['label' => 'Offshore DPR', 'url' => ['/offdpr/index']];
        // $menuItems[] = ['label' => 'Onland SI', 'url' => ['/si/index']];
        // $menuItems[] = ['label' => 'Onland DPR', 'url' => ['/dpr-onland/index']];
        $menuItems[] = ['label' => 'GSDASH', 'url' => null, 'linkOptions'=>[ 'href' => 'http://10.208.133.53/gsdash']];
        $menuItems[] = ['label' => 'GSDASH-TA-FY', 'url' => null, 'linkOptions'=>[ 'href' => 'http://10.208.133.53/gsdash/ta_fy.php']];
        
    } else {
        $menuItems[] = ['label' => 'SI', 'url' => ['/si/index']];
        $menuItems[] = ['label' => 'DPR', 'url' => ['/dpr-onland/index']];
        $menuItems[] = ['label' => 'T/A', 'url' => ['/target-vs-achievement/index']];
        $menuItems[] = ['label' => 'Manpower', 'url' => ['/manpowers/index']];
        $menuItems[] = ['label' => 'Postings', 'url' => ['/postings/index']];
        $menuItems[] = ['label' => 'FP', 'url' => ['/field-parties/index']];
        $menuItems[] = ['label' => 'Regions', 'url' => ['/regions/index']];
        $menuItems[] = ['label' => 'GSDASH', 'url' => null, 'linkOptions'=>[ 'href' => 'http://10.208.133.53/gsdash', 'target' => '_blank']];
        $menuItems[] = ['label' => 'GSDASH-TA-FY', 'url' => null, 'linkOptions'=>[ 'href' => 'http://10.208.133.53/gsdash/ta_fy.php', 'target' => '_blank']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right">Developed &amp; maintained by CGS Office, Mumbai.</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
