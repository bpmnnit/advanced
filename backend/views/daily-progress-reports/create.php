<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DailyProgressReports */

$this->title = 'Create Daily Progress Reports';
$this->params['breadcrumbs'][] = ['label' => 'Daily Progress Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-progress-reports-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
