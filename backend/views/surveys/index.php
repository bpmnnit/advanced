<?php

use backend\models\FieldParties;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SurveysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surveys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surveys-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Surveys', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'survey_id',
            'survey_sig',
            'survey_name',
            [
                'attribute' => 'survey_region',
                'format' => 'html', // use this to generate the <a> tag properly
                'value' => function($model) {
                    // getSurveyRegion() relationship used as $model->surveyRegion->region_name
                    return Html::a($model->surveyRegion->region_name, ['regions/view', 'id' => $model->survey_region], ['data-pjax' => '0']);
                }
            ],
            'survey_description:ntext',
            [
                'attribute' => 'survey_field_party',
                'format' => 'html', // use this to generate the <a> tag properly
                'value' => function($model) {
                    // getSurveyFieldParty() relationship used as $model->surveyFieldParty->field_party_name
                    return Html::a($model->surveyFieldParty->field_party_name, ['field-parties/view', 'id' => $model->survey_field_party], ['data-pjax' => '0']);
                }
            ],
            //'survey_information',
            //'surveyFieldParty.field_party_name'
            [
                'attribute' => 'survey_information',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->survey_name, ['surveys/download', 'survey_id' => $model->survey_id], ['data-pjax' => '0']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
