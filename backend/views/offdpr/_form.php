<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

use backend\models\Offproj;
/* @var $this yii\web\View */
/* @var $model backend\models\Offdpr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offdpr-form" style="width: 50%; margin: auto;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'offdpr_proj')->dropDownList(
                ArrayHelper::map(Offproj::find()->orderBy('offproj_contract')->all(), 'offproj_id', 'offproj_contract'), ['prompt' => 'Select a Project/Contract ...']); ?>

    <?= $form->field($model, 'offdpr_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'dpr_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->dpr_date],
                'options' => ['id' => 'dpr_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

    <?= $form->field($model, 'offdpr_streamer_profile')->dropDownList([ '6-12 m' => '6-12 m', '6-14 m' => '6-14 m', '6-16 m' => '6-16 m', '6-18 m' => '6-18 m', '6-20 m' => '6-20 m', ], ['prompt' => 'Select Streamer Profile...']) ?>

    <?= $form->field($model, 'offdpr_sail_line')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_line_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offdpr_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offdpr_direction')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_sp_from')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_sp_to')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_preplot_sp_from')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_preplot_sp_to')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_shots')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_bad_sp')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_shots_acc')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_cmps')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_prime')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_infill')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_chargeable_prime')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_chargeable_infill')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_ros')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_remarks_line')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'offdpr_standbyhrs')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_chargeable_standbyhrs')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'offdpr_remarks_standby')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'offdpr_ntbp')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => 'Select - Yes/No...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
