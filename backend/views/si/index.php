<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Sis';
$this->title = 'Seismic Investigations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="si-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create SI', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'si_id',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 30px;'],
            ],
            [
              'attribute' => 'si_no',
              'contentOptions' => ['class' => 'text-left', 'style' => 'width: 80px;'],

            ],
            [
                'attribute' => 'si_basin',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->siBasin->basin_india_name, ['basin-india/view', 'id' => $model->si_basin], ['data-pjax' => '0']);
                },
                'headerOptions' => ['class' => 'text-left'],
                'contentOptions' => ['class' => 'text-left', 'style' => 'width: 180px;'],
            ],
            [
                'attribute' => 'si_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->siRegion->region_name, ['regions/view', 'id' => $model->si_region], ['data-pjax' => '0']);
                },
                'headerOptions' => ['class' => 'text-left'],
                'contentOptions' => ['class' => 'text-left', 'style' => 'width: 60px;'],
            ],
            'si_area',
            [
              'attribute' => 'si_fp',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->siFp->field_party_name, ['field-parties/view', 'id' => $model->si_fp], ['data-pjax' => '0']);
              },
              'headerOptions' => ['class' => 'text-left'],
              'contentOptions' => ['class' => 'text-left', 'style' => 'width: 50px;'],
            ],
            //'si_objective',
            //'si_depth_zoi',
            //'si_time_zoi',
            [
                'attribute' => 'si_acq_type',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 30px;'],
            ],
            //'si_qow',
            //'si_source_type',
            //'si_spread_type',
            //'si_bin_size',
            //'si_gi',
            //'si_si',
            //'si_rli',
            //'si_sli',
            //'si_norl',
            //'si_rpl',
            //'si_tac',
            //'si_sps',
            [
                'attribute' => 'si_fold',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 30px;'],
            ],
            //'si_min_min_offset',
            //'si_min_max_offset',
            //'si_max_min_offset',
            //'si_max_max_offset',
            //'si_swath_rollover',
            //'si_rec_line_bearing',
            //'si_ar',
            [
                'attribute' => 'si_conversion_factor',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 30px;'],
            ],
            'si_mgh',
            [
                'attribute' => 'si_total_shot',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 30px;'],
            ],
            'si_rec_inst',
            //'si_record_length',
            //'si_sample_rate',
            //'si_rec_format',
            'si_sensor',
            //'si_field_Season',
            //'si_on_off',
            [
                'attribute' => 'si_start_date',
                'value' => 'si_start_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'si_start_date',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                    ],
                ]),
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 80px;'],
            ],
            [
                'attribute' => 'si_end_date',
                'value' => 'si_end_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'si_end_date',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                    ],
                ]),
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right .', 'style' => 'width: 80px;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
