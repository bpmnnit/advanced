<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FieldPartiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Field Parties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-parties-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Field Parties', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'field_party_id',
            //'field_party_number',
            'field_party_name',
            'field_party_type',
            [
                'attribute' => 'field_party_region',
                'value' => 'fieldPartyRegion.region_name',

            ],
            //'field_party_chief',
            [
                'attribute' => 'field_party_chief',
                'value' => 'fieldPartyChief.manpower_name',

            ],
            //'field_party_create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
