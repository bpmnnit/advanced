<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetVsAchievement */

$this->title = $model->targetAchievementSi->si_no . ' || ' . $model->target_achievement_area . ' || ' . $model->target_achievement_fy;
$this->params['breadcrumbs'][] = ['label' => 'Target Vs Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="target-vs-achievement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTarget_Achievement], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTarget_Achievement], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTarget_Achievement',
            'target_achievement_fy',
            [
              'attribute' => 'target_achievement_region',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->targetAchievementRegion->region_name, ['regions/view', 'id' => $model->target_achievement_region], ['data-pjax' => '0']);
              }
            ],
            [
              'attribute' => 'target_achievement_si',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->targetAchievementSi->si_no, ['si/view', 'id' => $model->target_achievement_si], ['data-pjax' => '0']);
              }
            ],
            'target_achievement_basin',
            'target_achievement_area',
            [
              'attribute' => 'target_achievement_field_party',
              'format' => 'html',
              'value' => function($model) {
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
        ],
    ]) ?>

</div>
