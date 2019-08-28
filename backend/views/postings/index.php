<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Postings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'posting_cpf',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->postingCpf->manpower_name, ['manpowers/view', 'id' => $model->posting_cpf], ['data-pjax' => '0']);
                }
            ],
            'posting_at',
            [
                'attribute' => 'posting_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->postingRegion->region_name, ['regions/view', 'id' => $model->posting_region], ['data-pjax' => '0']);
                }
            ],
            [
                'attribute' => 'posting_on',
                'value' => 'posting_on',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'posting_on',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ]),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
