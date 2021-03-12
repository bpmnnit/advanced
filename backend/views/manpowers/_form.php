<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manpowers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manpowers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'manpower_cpf')->textInput(['placeholder' => 'Enter the CPF Number']) ?>

    <?= $form->field($model, 'manpower_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter the name of the Personnel']) ?>

    <?= $form->field($model, 'manpower_designation')->dropDownList([ 'Executive Director' => 'Executive Director', 'Group General Manager' => 'Group General Manager', 'Chief General Manager' => 'Chief General Manager', 'General Manager' => 'General Manager', 'Deputy General Manager(Geophysics-Surface)' => 'Deputy General Manager (Geophysics-Surface)', 'Deputy General Manager (Geophysics-Wells)' => 'Deputy General Manager (Geophysics-Wells)', 'Deputy General Manager' => 'Deputy General Manager', 'Chief Manager' => 'Chief Manager', 'Chief Geophysicist' => 'Chief Geophysicist', 'Chief Geophysicist (Wells)' => 'Chief Geophysicist (Wells)', 'Chief Geophysicist (Surface)' => 'Chief Geophysicist (Surface)', 'Chief Geologist' =>'Chief Geologist', 'Chief Chemist' => 'Chief Chemist', 'Chief Engineer' => 'Chief Engineer', 'Deputy Suptdg. Geophysicist (Surface)' => 'Deputy Suptdg. Geophysicist (Surface)', 'Deputy Suptdg. Geophysicist (Wells)' => 'DeputySuptdg. Geophysicist (Wells)', 'Deputy Suptdg. Geophysicist' => 'Deputy Suptdg. Geophysicist', 'Manager' => 'Manager', 'Superintending Geophysicist (Surface)' => 'Superintending Geophysicist (Surface)', 'SuperintendingGeophysicist (Wells)' => 'Superintending Geophysicist (Wells)', 'Superintending Geophysicist' => 'Superintending Geophysicist', 'Senior Geophysicist (Surface)' => 'Senior Geophysicist (Surface)', 'SeniorGeophysicist(Wells)' => 'Senior Geophysicist (Wells)', 'Senior Geophysicist' => 'Senior Geophysicist', 'Superintending Geologist' => 'Superintending Geologist', 'Superintending Chemist' => 'Superintending Chemist', 'Superintending Engineer' => 'Superintending Engineer', 'Deputy Superintending Engineer' => 'Deputy Superintending Engineer', 'Executive Engineer' => 'Executive Engineer', 'Senior Officer' => 'Senior Officer',  'Officer' => 'Officer', 'Assistant Executive Engineer' => 'Assistant Executive Engineer', 'Senior Geologist' =>'Senior Geologist', 'Senior Chemist' => 'Senior Chemist', 'Geophysicist (Surface)' => 'Geophysicist (Surface)', 'Geophysicist (Wells)' => 'Geophysicist (Wells)', 'Geophysicist' => 'Geophysicist', 'Geologist' => 'Geologist', 'Chemist' => 'Chemist', 'Assistant Officer' => 'Assistant Officer', 'Assistant Engineer' => 'Assistant Engineer', 'Personal Secretary' => 'Personal Secretary', 'Chief Superintendent' => 'Chief Superintendent', 'Senior Foreman' =>'Senior Foreman', 'Senior Superintendent' => 'Senior Superintendent', 'Superintendent' => 'Superintendent', 'Foreman' => 'Foreman', 'Assistant Superintendent' => 'Assistant Superintendent', 'Assistant Foreman' => 'AssistantForeman', 'Junior Engineer' => 'Junior Engineer', 'Junior Superintendent' => 'Junior Superintendent', 'Junior Accountant' => 'Junior Accountant', 'Topman' => 'Topman', 'Chargeman' => 'Chargeman', 'Assistant Grade I' =>'Assistant Grade I', 'Junior Technician' => 'Junior Technician', 'Rig man' => 'Rig man', 'Assistant Grade II' => 'Assistant Grade II', 'Assistant Junior Technician' => 'Assistant Junior Technician', 'Assistant Rig man' =>'Assistant Rig man', 'Assistant Grade III' => 'Assistant Grade III', 'Junior Assistant Technician' => 'Junior Assistant Technician', 'Junior Assistant A-I' => 'Junior Assistant A-I', 'Junior Assistant' => 'Junior Assistant', 'Head Worker W-VII' => 'Head Worker W-VII', 'Deputy Head Worker' => 'Deputy Head Worker', 'Senior Worker W-V' => 'Senior Worker W-V', 'Attendant Grade-I' => 'Attendant Grade-I', 'Attendant Grade-II' => 'Attendant Grade-II', 'Attendant Grade-III' => 'Attendant Grade–III', 'Junior Attendant' => 'Junior Attendant', 'Junior Technician' => 'Junior Technician', 'Assistant Technician' => 'Assistant Technician', 'Chief Foreman' => 'Chief Foreman', 'Scientific Assistant' => 'Scientific Assistant', 'Junior Scientific Assistant' => 'Junior Scientific Assistant', 'Engineering Assistant' => 'Engineering Assistant', 'Junior Engineering Assistant' => 'Junior Engineering Assistant', 'Junior Motor Vehicle Driver' => 'Junior Motor Vehicle Driver' ], ['prompt' => 'Select Designation...']) ?>

    <?= $form->field($model, 'manpower_discipline')->dropDownList([ 'Geophysics' => 'Geophysics', 'E&T' => 'E&T', 'Programming' => 'Programming', 'Survey' => 'Survey', 'Electronics' => 'Electronics', 'Instrumentation' => 'Instrumentation', 'HR' => 'HR', 'MM' => 'MM', 'IT' => 'IT', 'P&A' => 'P&A', 'Mechanical' => 'Mechanical', 'Mathematics' => 'Mathematics', 'Duplicating Mechanical' => 'Duplicating Mechanical', 'Drilling' => 'Drilling', 'Marine' => 'Marine', 'Technical' => 'Technical', 'Field' => 'Field', 'Crane' => 'Crane', 'Office' => 'Office', 'H/V' => 'H/V', 'H/E' => 'H/E', 'Auto' => 'Auto', 'Auto Elect' => 'Auto Elect', 'Winch' => 'Winch', 'Hygiene' => 'Hygiene', 'Geoscience' => 'Geoscience', 'T/B' => 'T/B', 'Steno' => 'Steno', 'Diesel' => 'Diesel' ], ['prompt' => 'Select Discipline ...']) ?>

    <?= $form->field($model, 'manpower_charge')->textInput(['maxlength' => true, 'placeholder' => 'Enter the charge being held by the Personnel']) ?>

    <?= $form->field($model, 'manpower_level')->dropDownList([ 'E9' => 'E9', 'E8' => 'E8', 'E7' => 'E7', 'E6' => 'E6', 'E5' => 'E5', 'E4' => 'E4', 'E3' => 'E3', 'E2' => 'E2', 'E1' => 'E1', 'E0' => 'E0', 'A4' => 'A4', 'A3' => 'A3', 'A2' => 'A2', 'A1' => 'A1', 'W7' => 'W7', 'W6' => 'W6', 'W5' => 'W5', 'W4' => 'W4', 'W3' => 'W3', 'W2' => 'W2', 'W1' => 'W1', 'S4' => 'S4', 'S3' => 'S3', 'S2' => 'S2', 'S1' => 'S1', 'F2' => 'F2', 'F1' => 'F1' ], ['prompt' => 'Select Level ...']) ?>

    <?= $form->field($model, 'manpower_crc')->dropDownList([ 'L1' => 'L1', 'L2' => 'L2', 'L3' => 'L3', 'L4' => 'L4', ], ['prompt' => 'Select CRC Level ...']) ?>

    <?= $form->field($model, 'manpower_mobile_number')->textInput(['maxlength' => true, 'placeholder' => 'Enter 10 digits Mobile Number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
