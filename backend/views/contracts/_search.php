<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContractsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'contract_id') ?>

    <?= $form->field($model, 'contract_field_season') ?>

    <?= $form->field($model, 'contract_tender_number') ?>

    <?= $form->field($model, 'contract_tender_type') ?>

    <?= $form->field($model, 'contract_survey_type') ?>

    <?php echo $form->field($model, 'contract_description') ?>

    <?php echo $form->field($model, 'contract_area') ?>

    <?php echo $form->field($model, 'contract_quantum') ?>

    <?php echo $form->field($model, 'contract_basin') ?>

    <?php echo $form->field($model, 'contract_region') ?>

    <?php echo $form->field($model, 'contract_block') ?>

    <?php echo $form->field($model, 'contract_contactor') ?>

    <?php echo $form->field($model, 'contract_awarded_value') ?>

    <?php echo $form->field($model, 'contract_start_date') ?>

    <?php echo $form->field($model, 'contract_end_date') ?>

    <?php echo $form->field($model, 'contract_remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
