<?php

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

            //'posting_id',
            
            [
                'attribute' => 'posting_cpf',
                'value' => 'postingCpf.manpower_name',

            ],
            [
                'attribute' => 'posting_region',
                'value' => 'postingRegion.region_name',

            ],
            'posting_at',
            'posting_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
