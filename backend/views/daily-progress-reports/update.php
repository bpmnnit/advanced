<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DailyProgressReports */

$this->title = 'Update Daily Progress Reports: ' . $model->daily_progress_report_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Progress Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->daily_progress_report_id, 'url' => ['view', 'id' => $model->daily_progress_report_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daily-progress-reports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
