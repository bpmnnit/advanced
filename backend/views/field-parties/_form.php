<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use backend\models\Regions;
use backend\models\Manpowers;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldParties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="field-parties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'field_party_name')->textInput([['maxlength' => true], 'placeholder' => 'Enter the Field Name. Eg. GP-26']) ?>

    <?= $form->field($model, 'field_party_type')->dropDownList([ 'DEPARTMENTAL' => 'DEPARTMENTAL', 'OUTSOURCED' => 'OUTSOURCED', 'VSP' => 'VSP',], ['prompt' => 'Select Field Party Type ...']) ?>

    <?= $form->field($model, 'field_party_region')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Region ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'field_party_chief')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Manpowers::find()->all(), 'manpower_cpf', 'manpower_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Party Chief ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'field_party_create_date')->widget(
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
