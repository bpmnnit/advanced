<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OffprojSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offshore Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offproj-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Offproj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'offproj_id',
            'offproj_area',
            'offproj_contract',
            'offproj_vessel',
            'offproj_contractor',
            [
              'attribute' => 'offproj_start_date',
              'value' => 'offproj_start_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'offproj_start_date',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true,
                  ],
              ]),
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
            ],
            [
              'attribute' => 'offproj_end_date',
              'value' => 'offproj_end_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'offproj_end_date',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true,
                  ],
              ]),
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
            ],
            [
              'attribute' => 'offproj_mob_start_date',
              'value' => 'offproj_mob_start_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'offproj_mob_start_date',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true,
                  ],
              ]),
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
            ],
            [
              'attribute' => 'offproj_mob_end_date',
              'value' => 'offproj_mob_end_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'offproj_mob_end_date',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true,
                  ],
              ]),
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
            ],
            'offproj_volume',
            'offproj_source_interval',
            'offproj_sail_line_interval',
            'offproj_streamer_length',
            'offproj_receiver_interval',
            'offproj_shot_point_interval',
            'offproj_source_array',
            'offproj_streamers',
            'offproj_record_length',
            'offproj_prime',
            'offproj_infill_cap',
            'offproj_prefix',
            'offproj_direction_x',
            'offproj_direction_y',
            'offproj_streamer_profile',
            'offproj_planned_completion_days',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
