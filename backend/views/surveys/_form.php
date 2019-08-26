<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\FieldParties;
use backend\models\Regions;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Surveys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveys-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'survey_sig')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_area_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_region')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Region...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'survey_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'survey_acq_type')->dropDownList([ '3D' => '3D', '3D3C' => '3D3C', '2D' => '2D', '4D' => '4D', '3D-OBC' => '3D-OBC', '3D-OBN' => '3D-OBN', '3D-BROADBAND' => '3D-BROADBAND',], ['prompt' => 'Select Acquistion Type...']) ?>

    <?= $form->field($model, 'survey_shot_type')->dropDownList([ 'EXPLOSIVE' => 'EXPLOSIVE', 'VIBROSEIS' => 'VIBROSEIS', 'AIRGUN' => 'AIRGUN',], ['prompt' => 'Select Source...']) ?>

    <?= $form->field($model, 'survey_field_party')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(FieldParties::find()->all(), 'field_party_id', 'field_party_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Field Party...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'survey_onshore_offshore')->dropDownList([ 'ONSHORE' => 'ONSHORE', 'OFFSHORE' => 'OFFSHORE',], ['prompt' => 'Select Acquistion Type...']) ?>

    <?= $form->field($model, 'survey_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
