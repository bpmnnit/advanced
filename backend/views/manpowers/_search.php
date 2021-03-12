<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ManpowersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manpowers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'manpower_cpf') ?>

    <?= $form->field($model, 'manpower_name') ?>

    <?= $form->field($model, 'manpower_charge') ?>

    <?= $form->field($model, 'manpower_mobile_number') ?>

    <?= $form->field($model, 'manpower_create_date') ?>

    <?php // echo $form->field($model, 'manpower_level') ?>

    <?php // echo $form->field($model, 'manpower_discipline') ?>

    <?php // echo $form->field($model, 'manpower_designation') ?>

    <?php // echo $form->field($model, 'manpower_crc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
