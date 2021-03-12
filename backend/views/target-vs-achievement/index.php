<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TargetVsAchievementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Target Vs Achievements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-vs-achievement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Target Vs Achievement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTarget_Achievement',
            'target_achievement_fy',
            [
                'attribute' => 'target_achievement_region',
                'format' => 'html', // use this to generate the <a> tag properly
                'value' => function($model) {
                    // getSurveyRegion() relationship used as $model->surveyRegion->region_name
                    return Html::a($model->targetAchievementRegion->region_name, ['regions/view', 'id' => $model->target_achievement_region], ['data-pjax' => '0']);
                }
            ],
            [
              'attribute' => 'target_achievement_si',
              'format' => 'html', // use this to generate the <a> tag properly
              'value' => function($model) {
                  // getSurveyRegion() relationship used as $model->surveyRegion->region_name
                  return Html::a($model->targetAchievementSi->si_no, ['si/view', 'id' => $model->target_achievement_si], ['data-pjax' => '0']);
              }
            ],
            'target_achievement_basin',
            'target_achievement_area',
            [
              'attribute' => 'target_achievement_field_party',
              'format' => 'html', // use this to generate the <a> tag properly
              'value' => function($model) {
                  // getSurveyRegion() relationship used as $model->surveyRegion->region_name
                  return Html::a($model->targetAchievementFieldParty->field_party_name, ['field-parties/view', 'id' => $model->target_achievement_field_party], ['data-pjax' => '0']);
              }
            ],
            'target_achievement_acq_type',
            'target_achievement_dept_out',
            'target_achievement_acreage_type',
            'target_achievement_land_offshore',
            'target_achievement_re_target',
            'target_achievement_be_target',
            'target_achievement_achievement',
            'target_achievement_remarks',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
