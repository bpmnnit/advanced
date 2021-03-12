<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Manpowers;
use backend\models\Regions;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Postings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="postings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'posting_cpf')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Manpowers::find()->all(), 'manpower_cpf', 'manpower_name'),
	    'language' => 'de',
	    'options' => ['placeholder' => 'Select Manpower ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>

    <?= $form->field($model, 'posting_region')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
	    'language' => 'de',
	    'options' => ['placeholder' => 'Select Region ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>

     <?= $form->field($model, 'posting_at')->dropDownList([ 'Base Office' => 'Base Office', 'RCC' => 'RCC', 'Processing' => 'Processing', 'Interpretation' => 'Interpretation', 'Database' => 'Database', 'REL' => 'REL', 'QC' => 'QC', 'NSP' => 'NSP', 'BM Office' => 'BM Office', 'HGS Office' => 'HGS Office', 'Operations' => 'Operations', 'Planning & Contract' => 'Planning & Contract', 'CGS Office/MAP' => 'CGS Office/MAP', 'Block' => 'Block', 'BMG' => 'BMG', 'GP-03' => 'GP-03', 'GP-06' => 'GP-06', 'GP-08' => 'GP-08', 'GP-09' => 'GP-09', 'GP-10' => 'GP-10', 'GP-11' => 'GP-11', 'GP-12' => 'GP-12', 'GP-16' => 'GP-16', 'GP-17' => 'GP-17', 'GP-23' => 'GP-23', 'GP-26' => 'GP-26', 'GP-38' => 'GP-38', 'GP-61' => 'GP-61', 'GP-62' => 'GP-62', 'GP-64' => 'GP-64', 'GP-81' => 'GP-81', 'GP-82' => 'GP-82', 'GP-90' => 'GP-90', 'VSP Party' => 'VSP Party', 'HR' => 'HR', 'Finance' => 'Finance', 'Infocom Services' => 'Infocom Services', 'Specialist Group' => 'Specialist Group', 'MM' => 'MM', 'Logistics' => 'Logistics', 'HSE' => 'HSE', 'Security' => 'Security', ], ['prompt' => 'Select Any One...']) ?>

    <?= $form->field($model, 'posting_on')->widget(
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
