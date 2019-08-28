<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DprOnlandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Onland DPR';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpr-onland-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create DPR', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'dpr_date',
            [
                'attribute' => 'dpr_field_party',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->dprFieldParty->field_party_name, ['field-parties/view', 'id' => $model->dpr_field_party], ['data-pjax' => '0']);
                }
            ],
            'dpr_shots_acc',
            'dpr_shots_rej',
            'dpr_shots_skip',
            'dpr_shots_rep',
            'dpr_shots_rec',
            [
                'attribute' => 'dpr_conv_factor',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['decimal', 4],
            ],
            [
                'attribute' => 'dpr_coverage',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['decimal', 4],
            ],
            'dpr_area',
            'dpr_shot_type',
            'dpr_acq_type',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
