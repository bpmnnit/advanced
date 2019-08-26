<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DailyProgressReportsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Progress Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-progress-reports-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Daily Progress Reports', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'daily_progress_report_id',
            'daily_progress_report_survey',
            'daily_progress_report_field_party',
            'daily_progress_report_date',
            'daily_progress_report_accepted_shots',
            //'daily_progress_report_rejected_shots',
            //'daily_progress_report_skipped_shots',
            //'daily_progress_report_repeated_shots',
            //'daily_progress_report_instrument',
            //'daily_progress_report_skm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
