<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\FieldParties;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dpr-onland-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dpr_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ]); ?>

    <?= $form->field($model, 'dpr_field_party')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(FieldParties::find()->all(), 'field_party_id', 'field_party_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Field Party...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'dpr_shots_acc')->textInput() ?>

    <?= $form->field($model, 'dpr_shots_rej')->textInput() ?>

    <?= $form->field($model, 'dpr_shots_skip')->textInput() ?>

    <?= $form->field($model, 'dpr_shots_rec')->textInput() ?>

    <?= $form->field($model, 'dpr_conv_factor')->textInput() ?>

    <?= $form->field($model, 'dpr_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpr_shot_type')->dropDownList([ 'EXPLOSIVE' => 'EXPLOSIVE', 'VIBROSEIS' => 'VIBROSEIS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dpr_acq_type')->dropDownList([ '3D' => '3D', '2D' => '2D', '3D3C' => '3D3C', '4D' => '4D', '4D3C' => '4D3C', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dpr_party_type')->dropDownList([ 'DEPARTMENTAL' => 'DEPARTMENTAL', 'OUTSOURCED' => 'OUTSOURCED', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
