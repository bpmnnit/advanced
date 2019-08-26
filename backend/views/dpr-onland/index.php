<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DprOnlandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dpr Onlands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpr-onland-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dpr Onland', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dpr_id',
            'dpr_date',
            'dpr_field_party',
            'dpr_shots_acc',
            'dpr_shots_rej',
            'dpr_shots_skip',
            'dpr_shots_rec',
            'dpr_conv_factor',
            'dpr_coverage',
            'dpr_area',
            'dpr_shot_type',
            'dpr_acq_type',
            'dpr_party_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
