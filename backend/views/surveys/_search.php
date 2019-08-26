<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SurveysSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveys-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'survey_id') ?>

    <?= $form->field($model, 'survey_sig') ?>

    <?= $form->field($model, 'survey_name') ?>

    <?= $form->field($model, 'survey_region') ?>

    <?= $form->field($model, 'survey_latitude') ?>

    <?php // echo $form->field($model, 'survey_longitude') ?>

    <?php // echo $form->field($model, 'survey_easting') ?>

    <?php // echo $form->field($model, 'survey_northing') ?>

    <?php // echo $form->field($model, 'survey_description') ?>

    <?php // echo $form->field($model, 'survey_shot_type') ?>

    <?php // echo $form->field($model, 'survey_acq_type') ?>

    <?php // echo $form->field($model, 'survey_area_name') ?>

    <?php // echo $form->field($model, 'survey_field_party') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
