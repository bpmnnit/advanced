<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OffprojSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offproj-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'offproj_id') ?>

    <?= $form->field($model, 'offproj_area') ?>

    <?= $form->field($model, 'offproj_contract') ?>

    <?= $form->field($model, 'offproj_vessel') ?>

    <?= $form->field($model, 'offproj_contractor') ?>

    <?php // echo $form->field($model, 'offproj_start_date') ?>

    <?php // echo $form->field($model, 'offproj_end_date') ?>

    <?php // echo $form->field($model, 'offproj_mob_start_date') ?>

    <?php // echo $form->field($model, 'offproj_mob_end_date') ?>

    <?php // echo $form->field($model, 'offproj_volume') ?>

    <?php // echo $form->field($model, 'offproj_source_interval') ?>

    <?php // echo $form->field($model, 'offproj_sail_line_interval') ?>

    <?php // echo $form->field($model, 'offproj_streamer_length') ?>

    <?php // echo $form->field($model, 'offproj_receiver_interval') ?>

    <?php // echo $form->field($model, 'offproj_shot_point_interval') ?>

    <?php // echo $form->field($model, 'offproj_source_array') ?>

    <?php // echo $form->field($model, 'offproj_streamers') ?>

    <?php // echo $form->field($model, 'offproj_record_length') ?>

    <?php // echo $form->field($model, 'offproj_prime') ?>

    <?php // echo $form->field($model, 'offproj_infill_cap') ?>

    <?php // echo $form->field($model, 'offproj_prefix') ?>

    <?php // echo $form->field($model, 'offproj_direction_x') ?>

    <?php // echo $form->field($model, 'offproj_direction_y') ?>

    <?php // echo $form->field($model, 'offproj_streamer_profile') ?>

    <?php // echo $form->field($model, 'offproj_planned_completion_days') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
