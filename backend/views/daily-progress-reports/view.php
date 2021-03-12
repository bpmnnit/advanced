<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DailyProgressReports */

$this->title = $model->daily_progress_report_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Progress Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="daily-progress-reports-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->daily_progress_report_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->daily_progress_report_id], [
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
            'daily_progress_report_id',
            'daily_progress_report_survey',
            'daily_progress_report_field_party',
            'daily_progress_report_date',
            'daily_progress_report_accepted_shots',
            'daily_progress_report_rejected_shots',
            'daily_progress_report_skipped_shots',
            'daily_progress_report_repeated_shots',
            'daily_progress_report_instrument',
            'daily_progress_report_skm',
        ],
    ]) ?>

</div>
