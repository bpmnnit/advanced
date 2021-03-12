<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContractsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contracts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contracts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'contract_field_season',
            'contract_tender_number',
            'contract_tender_type',
            'contract_survey_type',
            'contract_description',
            'contract_area',
            'contract_quantum',
            'contract_basin',
            [
                'attribute' => 'contract_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->contractRegion->region_name, ['regions/view', 'id' => $model->contract_region], ['data-pjax' => '0']);
                }
            ],
            'contract_block',
            'contract_contactor',
            'contract_awarded_value',
            [
                'attribute' => 'contract_start_date',
                'value' => 'contract_start_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'contract_start_date',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ]),
            ],
            [
                'attribute' => 'contract_end_date',
                'value' => 'contract_end_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'contract_end_date',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ]),
            ],
            'contract_remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
