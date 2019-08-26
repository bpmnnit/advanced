<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PostingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="postings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'posting_id') ?>

    <?= $form->field($model, 'posting_cpf') ?>

    <?= $form->field($model, 'posting_region') ?>

    <?= $form->field($model, 'posting_at') ?>

    <?= $form->field($model, 'posting_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
