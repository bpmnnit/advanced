<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldPartiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="field-parties-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'field_party_id') ?>

    <?= $form->field($model, 'field_party_number') ?>

    <?= $form->field($model, 'field_party_name') ?>

    <?= $form->field($model, 'field_party_type') ?>

    <?= $form->field($model, 'field_party_region') ?>

    <?php // echo $form->field($model, 'field_party_chief') ?>

    <?php // echo $form->field($model, 'field_party_create_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
