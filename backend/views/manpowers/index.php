<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Postings;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManpowersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manpowers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manpowers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manpowers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute' => 'manpower_cpf',
              'contentOptions' => ['class' => 'text-left', 'style' => 'width: 80px;'],
            ],
            'manpower_name',
            'manpower_designation',
            'manpower_discipline',
            [
              'attribute' => 'manpower_level',
              'contentOptions' => ['class' => 'text-left', 'style' => 'width: 30px;'],
            ],
            'manpower_charge', 
            [
              'attribute' => 'manpower_crc',
              'contentOptions' => ['class' => 'text-left', 'style' => 'width: 30px;'],
            ],
            'manpower_mobile_number',
            // [
            //   'attribute' => 'manpower_current_posting',
            //   'format' => 'html',
            //   'value' => function($model) {
            //     $postingId = $model->manpowerCurrentPosting->posting_id;
            //     $postingModel = Postings::findOne($postingId);
            //     $postingRegion = $postingModel->postingRegion->region_name;
            //     return Html::a($postingRegion, ['regions/view', 'id' => $postingModel->postingRegion->region_id], ['data-pjax' => '0']);
            //   },
            //   'headerOptions' => ['class' => 'text-left'],
            //   'contentOptions' => ['class' => 'text-left', 'style' => 'width: 160px;'],
            //   'filterInputOptions' => [
            //     'class'       => 'form-control',
            //     'placeholder' => 'Posting place...'
            //   ],
            //   'filter' => '',
            // ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
