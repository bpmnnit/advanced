<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Candidates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advt_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'criteria_met')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_of_post')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payscale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discipline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortlisted_as_ur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'candidate_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'address_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ex_serviceman')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwd_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departmental')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpfno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_work_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ex_apprentice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qualification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percentage_in_qualification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_marks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wt_85')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wt_90')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skill_test_steno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skill_test_typing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skill_test_others')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marks_written_A')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marks_acad_B_15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marks_acad_B_10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marks_apprent_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marks_apprent_0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalmarks_ABC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
