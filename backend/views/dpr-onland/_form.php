<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\FieldParties;
use backend\models\Si;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use scotthuangzl\googlechart\GoogleChart;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-6">
        <div class="dpr-onland-form">

            <?php $form = ActiveForm::begin(); ?>

            <!-- <?= $form->field($model, 'dpr_field_party')->dropDownList(
                ArrayHelper::map(FieldParties::find()->orderBy('field_party_name')->all(), 'field_party_id', 'field_party_name'), ['prompt' => 'Select Field Party ...', 'id' => 'fp-id'],
            ); ?> -->

            <?= $form->field($model, 'dpr_field_party')->widget(Select2::classname(), [
              'data' => ArrayHelper::map(FieldParties::find()->orderBy('field_party_name')->all(), 'field_party_id', 'field_party_name'),
              'language' => 'de',
              'options' => ['placeholder' => 'Select Field Party ...', 'id' => 'fp-id'],
              'pluginOptions' => [
                'allowClear' => true
              ],
            ]); ?>

            <?= $form->field($model, 'dpr_si')->widget(DepDrop::classname(), [
              'options' => [
                'id' => 'sig-id',
                'onchange' => 'getmaxsig("'.Yii::$app->urlManager->createUrl(['dpr-onland/maxsigdate']).'");',
              ],
              'type' => DepDrop::TYPE_SELECT2, // OR 1 for normal select, 2 for select2
              'pluginOptions' => [
                'depends' => ['fp-id'],
                'initDepends' => ['fp-id'],
                'placeholder' => 'Select SIG...',
                'loading' => true,
                'initialize' => true,
                'url' => Url::to(['dpr-onland/sig']),
              ],
            ]); ?>

            <?= $form->field($model, 'dpr_date')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                //'options' => ['id' => 'dpr_date', 'value' => (!$this->context->isUpdate) ? date('Y-m-d', strtotime("-1 days")) : $model->dpr_date],
                'options' => ['id' => 'dpr_date'],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>

            <?= $form->field($model, 'dpr_shots_acc')->textInput(['id' => 'acc']) ?>

            <?= $form->field($model, 'dpr_shots_rej')->textInput(['id' => 'rej']) ?>

            <?= $form->field($model, 'dpr_shots_skip')->textInput(['id' => 'skip']) ?>

            <?= $form->field($model, 'dpr_shots_rep')->textInput(['id' => 'rep']) ?>

            <?= $form->field($model, 'dpr_shots_rec')->textInput(['id' => 'rec']) ?>

            <?= $form->field($model, 'dpr_coverage_shots')->textInput(['id' => 'cov_shots']) ?>

            <?= $form->field($model, 'dpr_coverage')->textInput(['id' => 'coverage']) ?>

            <?= $form->field($model, 'dpr_remarks')->textInput(['maxlength' => true]) ?>
            
            <!-- <?= ($this->context->isUpdate) ? $form->field($model, 'dpr_coverage')->textInput(['maxlength' => true]) : '' ?> -->

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-lg-6">
        <?php 
            $chartData = $model->totalTargetAchievement('3D', '2019-20');
            echo GoogleChart::widget(array('visualization' => 'ColumnChart',
                'data' => array(
                    array('', 'BE', 'RE', 'Ach'),
                    array('', (int)$chartData['BE'], (int)$chartData['RE'], (int)$chartData['ACH']),
                ),
                'options' => array(
                    'title' => '3D: Target vs Achievement (2019-20)',
                    'vAxis' => array(
                        'title' => 'SKM/LKM',
                        'gridlines' => array(
                            'color' => 'transparent'  //set grid line transparent
                        )),
                    'hAxis' => array('title' => ''),
                    'legend' => array('position' => 'right'),
                )
            )); 
        ?>
        <?php 
            $chartData = $model->totalTargetAchievement('2D', '2019-20');
            echo GoogleChart::widget(array('visualization' => 'ColumnChart',
                'data' => array(
                    array('', 'BE', 'RE', 'Ach'),
                    array('', (int)$chartData['BE'], (int)$chartData['RE'], (int)$chartData['ACH']),
                ),
                'options' => array(
                    'title' => '2D: Target vs Achievement (2019-20)',
                    'vAxis' => array(
                        'title' => 'SKM/LKM',
                        'gridlines' => array(
                            'color' => 'transparent'  //set grid line transparent
                        )),
                    'hAxis' => array('title' => ''),
                    'legend' => array('position' => 'right'),
                )
            )); 
        ?>

    </div>    
</div>