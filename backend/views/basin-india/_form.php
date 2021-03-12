<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BasinIndia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basin-india-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'basin_india_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'basin_india_type')->dropDownList([ 'CATEGORY-I' => 'CATEGORY-I', 'CATEGORY-II' => 'CATEGORY-II', 'CATEGORY-III' => 'CATEGORY-III', 'CATEGORY-IV' => 'CATEGORY-IV', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
