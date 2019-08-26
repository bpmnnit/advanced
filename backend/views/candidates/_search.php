<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CandidatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'venue') ?>

    <?= $form->field($model, 'advt_no') ?>

    <?= $form->field($model, 'post_type') ?>

    <?php // echo $form->field($model, 'criteria_met') ?>

    <?php // echo $form->field($model, 'post') ?>

    <?php // echo $form->field($model, 'location_of_post') ?>

    <?php // echo $form->field($model, 'payscale') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'discipline') ?>

    <?php // echo $form->field($model, 'shortlisted_as_ur') ?>

    <?php // echo $form->field($model, 'candidate_name') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'address_1') ?>

    <?php // echo $form->field($model, 'address_2') ?>

    <?php // echo $form->field($model, 'address_3') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'pin') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'ex_serviceman') ?>

    <?php // echo $form->field($model, 'pwd') ?>

    <?php // echo $form->field($model, 'pwd_type') ?>

    <?php // echo $form->field($model, 'departmental') ?>

    <?php // echo $form->field($model, 'cpfno') ?>

    <?php // echo $form->field($model, 'current_work_location') ?>

    <?php // echo $form->field($model, 'ex_apprentice') ?>

    <?php // echo $form->field($model, 'qualification') ?>

    <?php // echo $form->field($model, 'percentage_in_qualification') ?>

    <?php // echo $form->field($model, 'total_marks') ?>

    <?php // echo $form->field($model, 'wt_85') ?>

    <?php // echo $form->field($model, 'wt_90') ?>

    <?php // echo $form->field($model, 'skill_test_steno') ?>

    <?php // echo $form->field($model, 'skill_test_typing') ?>

    <?php // echo $form->field($model, 'skill_test_others') ?>

    <?php // echo $form->field($model, 'pst') ?>

    <?php // echo $form->field($model, 'pet') ?>

    <?php // echo $form->field($model, 'marks_written_A') ?>

    <?php // echo $form->field($model, 'marks_acad_B_15') ?>

    <?php // echo $form->field($model, 'marks_acad_B_10') ?>

    <?php // echo $form->field($model, 'marks_apprent_5') ?>

    <?php // echo $form->field($model, 'marks_apprent_0') ?>

    <?php // echo $form->field($model, 'totalmarks_ABC') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'reg_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
