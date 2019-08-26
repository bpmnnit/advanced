<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DailyProgressReports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daily-progress-reports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'daily_progress_report_id')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_survey')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_field_party')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_date')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_accepted_shots')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_rejected_shots')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_skipped_shots')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_repeated_shots')->textInput() ?>

    <?= $form->field($model, 'daily_progress_report_instrument')->dropDownList([ 'UL-508XT' => 'UL-508XT', 'UL-408' => 'UL-408', 'ION Analog' => 'ION Analog', 'ION Digital' => 'ION Digital', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'daily_progress_report_skm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
