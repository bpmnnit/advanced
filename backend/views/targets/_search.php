<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="targets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'target_id') ?>

    <?= $form->field($model, 'target_field_party') ?>

    <?= $form->field($model, 'target_date') ?>

    <?= $form->field($model, 'target_conversion_factor') ?>

    <?= $form->field($model, 'target_mgh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
