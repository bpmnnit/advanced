<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Offproj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offproj-form" style="width: 50%; margin: auto;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'offproj_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_contract')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_vessel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_contractor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_start_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'offproj_start_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->offproj_start_date],
                'options' => ['id' => 'offproj_start_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

    <?= $form->field($model, 'offproj_end_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'offproj_end_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->offproj_end_date],
                'options' => ['id' => 'offproj_end_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

    <?= $form->field($model, 'offproj_mob_start_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'offproj_mob_start_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->offproj_mob_start_date],
                'options' => ['id' => 'offproj_mob_start_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

    <?= $form->field($model, 'offproj_mob_end_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'offproj_mob_end_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->offproj_mob_end_date],
                'options' => ['id' => 'offproj_mob_end_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

    <?= $form->field($model, 'offproj_volume')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_source_interval')->textInput(['type' => 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/']) ?>

    <?= $form->field($model, 'offproj_sail_line_interval')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_streamer_length')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_receiver_interval')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_shot_point_interval')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_source_array')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_streamers')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_record_length')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_prime')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_infill_cap')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_direction_x')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_direction_y')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offproj_streamer_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offproj_planned_completion_days')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
