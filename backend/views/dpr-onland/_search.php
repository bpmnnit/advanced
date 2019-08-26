<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnlandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dpr-onland-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'dpr_id') ?>

    <?= $form->field($model, 'dpr_date') ?>

    <?= $form->field($model, 'dpr_field_party') ?>

    <?= $form->field($model, 'dpr_shots_acc') ?>

    <?= $form->field($model, 'dpr_shots_rej') ?>

    <?php // echo $form->field($model, 'dpr_shots_skip') ?>

    <?php // echo $form->field($model, 'dpr_shots_rec') ?>

    <?php // echo $form->field($model, 'dpr_conv_factor') ?>

    <?php // echo $form->field($model, 'dpr_coverage') ?>

    <?php // echo $form->field($model, 'dpr_area') ?>

    <?php // echo $form->field($model, 'dpr_shot_type') ?>

    <?php // echo $form->field($model, 'dpr_acq_type') ?>

    <?php // echo $form->field($model, 'dpr_party_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
