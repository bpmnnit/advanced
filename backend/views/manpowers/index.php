<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
            'manpower_cpf',
            'manpower_name',
            'manpower_designation',
            'manpower_charge',
            'manpower_discipline',
            'manpower_level',
            'manpower_mobile_number',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
