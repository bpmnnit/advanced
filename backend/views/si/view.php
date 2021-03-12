<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Si */

$this->title = $model->si_no;
$this->params['breadcrumbs'][] = ['label' => 'Sis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="si-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->si_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->si_id], [
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
            'si_id',
            'si_no',
            [
              'attribute' => 'si_basin',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->siBasin->basin_india_name, ['basin-india/view', 'id' => $model->si_basin], ['data-pjax' => '0']);
              }
            ],
            [
              'attribute' => 'si_region',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->siRegion->region_name, ['regions/view', 'id' => $model->si_region], ['data-pjax' => '0']);
              }
            ],
            'si_area',
            [
              'attribute' => 'si_fp',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->siFp->field_party_name, ['field-parties/view', 'id' => $model->si_fp], ['data-pjax' => '0']);
              }
            ],
            'si_objective',
            'si_depth_zoi',
            'si_time_zoi',
            'si_acq_type',
            'si_qow',
            'si_source_type',
            'si_spread_type',
            'si_bin_size',
            'si_gi',
            'si_si',
            'si_rli',
            'si_sli',
            'si_norl',
            'si_rpl',
            'si_tac',
            'si_sps',
            'si_fold',
            'si_min_min_offset',
            'si_min_max_offset',
            'si_max_min_offset',
            'si_max_max_offset',
            'si_swath_rollover',
            'si_rec_line_bearing',
            'si_ar',
            'si_conversion_factor',
            'si_mgh',
            'si_total_shot',
            'si_rec_inst',
            'si_record_length',
            'si_sample_rate',
            'si_rec_format',
            'si_sensor',
            'si_field_Season',
            'si_on_off',
            'si_start_date',
            'si_end_date',
        ],
    ]) ?>

</div>
