<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BasinIndia;
use backend\models\Regions;
use backend\models\FieldParties;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Si */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="si-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'si_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_basin')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(BasinIndia::find()->all(), 'idbasin_india', 'basin_india_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Basin ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'si_region')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Region ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'si_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_fp')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(FieldParties::find()->all(), 'field_party_id', 'field_party_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select FP ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>    


    <?= $form->field($model, 'si_objective')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_depth_zoi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_time_zoi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_acq_type')->dropDownList([ '2D' => '2D', '2D-3C' => '2D-3C', '2D-OBC' => '2D-OBC', '3D' => '3D', '3D-3C' => '3D-3C', '3D-OBC' => '3D-OBC', '3D-BB' => '3D-BB', '3D-OBN' => '3D-OBN', 'Passive Seismic' => 'Passive Seismic', 'LFPS' => 'LFPS', 'Gravity Survey' => 'Gravity Survey', 'MT' => 'MT', 'OTHERS' => 'OTHERS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'si_qow')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_source_type')->dropDownList([ 'EXPLOSIVE' => 'EXPLOSIVE', 'VIBROSEIS' => 'VIBROSEIS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'si_spread_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_bin_size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_gi')->textInput() ?>

    <?= $form->field($model, 'si_si')->textInput() ?>

    <?= $form->field($model, 'si_rli')->textInput() ?>

    <?= $form->field($model, 'si_sli')->textInput() ?>

    <?= $form->field($model, 'si_norl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_rpl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_tac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_sps')->textInput() ?>

    <?= $form->field($model, 'si_fold')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_min_min_offset')->textInput() ?>

    <?= $form->field($model, 'si_min_max_offset')->textInput() ?>

    <?= $form->field($model, 'si_max_min_offset')->textInput() ?>

    <?= $form->field($model, 'si_max_max_offset')->textInput() ?>

    <?= $form->field($model, 'si_swath_rollover')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_rec_line_bearing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_ar')->textInput() ?>

    <?= $form->field($model, 'si_conversion_factor')->textInput() ?>

    <?= $form->field($model, 'si_mgh')->textInput() ?>

    <?= $form->field($model, 'si_total_shot')->textInput() ?>

    <?= $form->field($model, 'si_rec_inst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_record_length')->textInput() ?>

    <?= $form->field($model, 'si_sample_rate')->textInput() ?>

    <?= $form->field($model, 'si_rec_format')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_sensor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'si_field_season')->dropDownList([ '2027-28' => '2027-28', '2026-27' => '2026-27', '2025-26' => '2025-26', '2024-25' => '2024-25', '2023-24' => '2023-24', '2022-23' => '2022-23', '2021-22' => '2021-22', '2020-21' => '2020-21', '2019-20' => '2019-20', '2018-19' => '2018-19', '2017-18' => '2017-18', '2016-17' => '2016-17', '2015-16' => '2015-16', '2014-15' => '2014-15', '2013-14' => '2013-14', '2012-13' => '2012-13', '2011-12' => '2011-12', '2010-11' => '2010-11', '2009-10' => '2009-10', '2008-09' => '2008-09', '2007-08' => '2007-08', '2006-07' => '2006-07', '2005-06' => '2005-06', '2004-05' => '2004-05', '2003-04' => '2003-04', '2002-03' => '2002-03', '2001-02' => '2001-02', '2000-01' => '2000-01', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'si_on_off')->dropDownList([ 'ONSHORE' => 'ONSHORE', 'OFFSHORE' => 'OFFSHORE', 'TRANSITION ZONE' => 'TRANSITION ZONE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'si_start_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'si_end_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
