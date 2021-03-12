<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Regions;
/* @var $this yii\web\View */
/* @var $model backend\models\Contracts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contracts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_field_season')->dropDownList([ '2019-20' => '2019-20', '2018-19' => '2018-19', '2017-18' => '2017-18', '2016-17' => '2016-17', '2015-16' => '2015-16', '2014-15' => '2014-15', '2013-14' => '2013-14', '2012-13' => '2012-13', '2011-12' => '2011-12', '2010-11' => '2010-11', '2009-10' => '2009-10', '2008-09' => '2008-09', '2007-08' => '2007-08', '2006-07' => '2006-07', '2005-06' => '2005-06', '2004-05' => '2004-05', '2003-04' => '2003-04', '2002-03' => '2002-03', '2001-02' => '2001-02', '2000-01' => '2000-01', ], ['prompt' => 'Enter a Field Season']) ?>

    <?= $form->field($model, 'contract_tender_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_tender_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_survey_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_quantum')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'contract_basin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_region')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a Region...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'contract_block')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_contactor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_awarded_value')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'contract_start_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ]); ?>

    <?= $form->field($model, 'contract_end_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ]); ?>

    <?= $form->field($model, 'contract_remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
