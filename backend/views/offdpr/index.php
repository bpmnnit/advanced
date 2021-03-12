<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OffdprSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offshore DPR';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offdpr-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Offdpr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'offdpr_id',
            //'offdpr_date',
            [
              'attribute' => 'offdpr_date',
              'value' => 'offdpr_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'offdpr_date',
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
              'attribute' => 'offdpr_proj',
              'format' => 'html',
              'value' => function($model) {
                  return Html::a($model->offdprProj->offproj_contract, ['offproj/view', 'id' => $model->offdpr_proj], ['data-pjax' => '0']);
              },
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 80px;'],
          ],
            'offdpr_streamer_profile',
            'offdpr_sail_line',
            'offdpr_line_no',
            'offdpr_type',
            'offdpr_direction',
            'offdpr_sp_from',
            'offdpr_sp_to',
            'offdpr_preplot_sp_from',
            'offdpr_preplot_sp_to',
            'offdpr_shots',
            'offdpr_bad_sp',
            'offdpr_shots_acc',
            'offdpr_cmps',
            'offdpr_prime',
            'offdpr_infill',
            'offdpr_chargeable_prime',
            'offdpr_chargeable_infill',
            'offdpr_ros',
            'offdpr_remarks_line:ntext',
            'offdpr_standbyhrs',
            'offdpr_chargeable_standbyhrs',
            'offdpr_remarks_standby:ntext',
            'offdpr_ntbp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
