<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Targets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="targets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'target_id')->textInput() ?>

    <?= $form->field($model, 'target_field_party')->textInput() ?>

    <?= $form->field($model, 'target_date')->textInput() ?>

    <?= $form->field($model, 'target_conversion_factor')->textInput() ?>

    <?= $form->field($model, 'target_mgh')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
