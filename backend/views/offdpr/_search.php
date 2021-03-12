<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OffdprSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offdpr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'offdpr_id') ?>

    <?= $form->field($model, 'offdpr_date') ?>

    <?= $form->field($model, 'offdpr_streamer_profile') ?>

    <?= $form->field($model, 'offdpr_sail_line') ?>

    <?= $form->field($model, 'offdpr_line_no') ?>

    <?php // echo $form->field($model, 'offdpr_type') ?>

    <?php // echo $form->field($model, 'offdpr_direction') ?>

    <?php // echo $form->field($model, 'offdpr_sp_from') ?>

    <?php // echo $form->field($model, 'offdpr_sp_to') ?>

    <?php // echo $form->field($model, 'offdpr_preplot_sp_from') ?>

    <?php // echo $form->field($model, 'offdpr_preplot_sp_to') ?>

    <?php // echo $form->field($model, 'offdpr_shots') ?>

    <?php // echo $form->field($model, 'offdpr_bad_sp') ?>

    <?php // echo $form->field($model, 'offdpr_shots_acc') ?>

    <?php // echo $form->field($model, 'offdpr_cmps') ?>

    <?php // echo $form->field($model, 'offdpr_prime') ?>

    <?php // echo $form->field($model, 'offdpr_infill') ?>

    <?php // echo $form->field($model, 'offdpr_chargeable_prime') ?>

    <?php // echo $form->field($model, 'offdpr_chargeable_infill') ?>

    <?php // echo $form->field($model, 'offdpr_ros') ?>

    <?php // echo $form->field($model, 'offdpr_remarks_line') ?>

    <?php // echo $form->field($model, 'offdpr_standbyhrs') ?>

    <?php // echo $form->field($model, 'offdpr_chargeable_standbyhrs') ?>

    <?php // echo $form->field($model, 'offdpr_remarks_standby') ?>

    <?php // echo $form->field($model, 'offdpr_ntbp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
