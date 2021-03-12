<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetVsAchievementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-vs-achievement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idTarget_Achievement') ?>

    <?= $form->field($model, 'target_achievement_fy') ?>

    <?= $form->field($model, 'target_achievement_region') ?>

    <?= $form->field($model, 'target_achievement_basin') ?>

    <?= $form->field($model, 'target_achievement_area') ?>

    <?php // echo $form->field($model, 'target_achievement_field_party') ?>

    <?php // echo $form->field($model, 'target_achievement_acq_type') ?>

    <?php // echo $form->field($model, 'target_achievement_dept_out') ?>

    <?php // echo $form->field($model, 'target_achievement_acreage_type') ?>

    <?php // echo $form->field($model, 'target_achievement_land_offshore') ?>

    <?php // echo $form->field($model, 'target_achievement_re_target') ?>

    <?php // echo $form->field($model, 'target_achievement_be_target') ?>

    <?php // echo $form->field($model, 'target_achievement_achievement') ?>

    <?php // echo $form->field($model, 'target_achievement_remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
