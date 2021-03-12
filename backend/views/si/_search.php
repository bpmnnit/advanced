<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="si-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'si_id') ?>

    <?= $form->field($model, 'si_no') ?>

    <?= $form->field($model, 'si_basin') ?>

    <?= $form->field($model, 'si_region') ?>

    <?= $form->field($model, 'si_area') ?>

    <?php // echo $form->field($model, 'si_gp') ?>

    <?php // echo $form->field($model, 'si_objective') ?>

    <?php // echo $form->field($model, 'si_depth_zoi') ?>

    <?php // echo $form->field($model, 'si_time_zoi') ?>

    <?php // echo $form->field($model, 'si_acq_type') ?>

    <?php // echo $form->field($model, 'si_qow') ?>

    <?php // echo $form->field($model, 'si_source_type') ?>

    <?php // echo $form->field($model, 'si_spread_type') ?>

    <?php // echo $form->field($model, 'si_bin_size') ?>

    <?php // echo $form->field($model, 'si_gi') ?>

    <?php // echo $form->field($model, 'si_si') ?>

    <?php // echo $form->field($model, 'si_rli') ?>

    <?php // echo $form->field($model, 'si_sli') ?>

    <?php // echo $form->field($model, 'si_norl') ?>

    <?php // echo $form->field($model, 'si_rpl') ?>

    <?php // echo $form->field($model, 'si_tac') ?>

    <?php // echo $form->field($model, 'si_sps') ?>

    <?php // echo $form->field($model, 'si_fold') ?>

    <?php // echo $form->field($model, 'si_min_min_offset') ?>

    <?php // echo $form->field($model, 'si_min_max_offset') ?>

    <?php // echo $form->field($model, 'si_max_min_offset') ?>

    <?php // echo $form->field($model, 'si_max_max_offset') ?>

    <?php // echo $form->field($model, 'si_swath_rollover') ?>

    <?php // echo $form->field($model, 'si_rec_line_bearing') ?>

    <?php // echo $form->field($model, 'si_ar') ?>
    
    <?php // echo $form->field($model, 'si_conversion_factor') ?>

    <?php // echo $form->field($model, 'si_mgh') ?>

    <?php // echo $form->field($model, 'si_total_shot') ?>

    <?php // echo $form->field($model, 'si_rec_inst') ?>

    <?php // echo $form->field($model, 'si_record_length') ?>

    <?php // echo $form->field($model, 'si_sample_rate') ?>

    <?php // echo $form->field($model, 'si_rec_format') ?>

    <?php // echo $form->field($model, 'si_sensor') ?>

    <?php // echo $form->field($model, 'si_field_Season') ?>

    <?php // echo $form->field($model, 'si_on_off') ?>

    <?php // echo $form->field($model, 'si_start_date') ?>

    <?php // echo $form->field($model, 'si_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
