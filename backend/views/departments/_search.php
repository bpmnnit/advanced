<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'department_name') ?>

    <?= $form->field($model, 'department_create_date') ?>

    <?= $form->field($model, 'department_status') ?>

    <?= $form->field($model, 'department_branch_id') ?>

    <?php // echo $form->field($model, 'department_company_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
