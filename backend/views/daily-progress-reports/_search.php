<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DailyProgressReportsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daily-progress-reports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'daily_progress_report_id') ?>

    <?= $form->field($model, 'daily_progress_report_survey') ?>

    <?= $form->field($model, 'daily_progress_report_field_party') ?>

    <?= $form->field($model, 'daily_progress_report_date') ?>

    <?= $form->field($model, 'daily_progress_report_accepted_shots') ?>

    <?php // echo $form->field($model, 'daily_progress_report_rejected_shots') ?>

    <?php // echo $form->field($model, 'daily_progress_report_skipped_shots') ?>

    <?php // echo $form->field($model, 'daily_progress_report_repeated_shots') ?>

    <?php // echo $form->field($model, 'daily_progress_report_instrument') ?>

    <?php // echo $form->field($model, 'daily_progress_report_skm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
