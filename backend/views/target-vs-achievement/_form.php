<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Regions;
use backend\models\FieldParties;
use backend\models\Si;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\TargetVsAchievement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-vs-achievement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'target_achievement_fy')->dropDownList([ '2027-28' => '2027-28', '2026-27' => '2026-27', '2025-26' => '2025-26', '2024-25' => '2024-25', '2023-24' => '2023-24', '2022-23' => '2022-23', '2021-22' => '2021-22', '2020-21' => '2020-21', '2019-20' => '2019-20', '2018-19' => '2018-19', '2017-18' => '2017-18', '2016-17' => '2016-17', '2015-16' => '2015-16', '2014-15' => '2014-15', '2013-14' => '2013-14', '2012-13' => '2012-13', '2011-12' => '2011-12', '2010-11' => '2010-11', '2009-10' => '2009-10', '2008-09' => '2008-09', '2007-08' => '2007-08', '2006-07' => '2006-07', '2005-06' => '2005-06', '2004-05' => '2004-05', '2003-04' => '2003-04', '2002-03' => '2002-03', '2001-02' => '2001-02', '2000-01' => '2000-01', ], ['prompt' => 'Select Financial Year...']) ?>

    <?= $form->field($model, 'target_achievement_region')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Regions::find()->all(), 'region_id', 'region_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Region...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'target_achievement_si')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Si::find()->all(), 'si_id', 'si_no'),
          'language' => 'de',
          'options' => ['placeholder' => 'Select SI...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>

    <?= $form->field($model, 'target_achievement_basin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_achievement_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_achievement_field_party')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(FieldParties::find()->all(), 'field_party_id', 'field_party_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select FP...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'target_achievement_acq_type')->dropDownList([ '2D' => '2D', ' 2D-3C' => ' 2D-3C', '2D-OBC' => '2D-OBC', '3D' => '3D', '3D-3C' => '3D-3C', '3D-OBC' => '3D-OBC', '3D-BB' => '3D-BB', '3D-OBN' => '3D-OBN', 'Passive Seismic' => 'Passive Seismic', 'LFPS' => 'LFPS', 'Gravity Survey' => 'Gravity Survey', 'MT' => 'MT', 'OTHERS' => 'OTHERS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'target_achievement_dept_out')->dropDownList([ 'Departmental' => 'Departmental', 'Contractual' => 'Contractual', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'target_achievement_acreage_type')->dropDownList([ 'Existing' => 'Existing', 'Future' => 'Future', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'target_achievement_land_offshore')->dropDownList([ 'Onshore' => 'Onshore', 'Offshore' => 'Offshore', 'Transition-Zone' => 'Transition-Zone', 'Others' => 'Others', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'target_achievement_re_target')->textInput() ?>

    <?= $form->field($model, 'target_achievement_be_target')->textInput() ?>

    <?= $form->field($model, 'target_achievement_achievement')->textInput() ?>

    <?= $form->field($model, 'target_achievement_remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
