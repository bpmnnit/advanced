<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Surveys */

$this->title = $model->survey_name;
$this->params['breadcrumbs'][] = ['label' => 'Surveys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surveys-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->survey_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->survey_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'survey_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->surveyRegion->region_name, ['regions/view', 'id' => $model->survey_region], ['data-pjax' => '0']);
                }
            ],
            'survey_sig',
            'survey_name',
            [
                'attribute' => 'survey_field_party',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->surveyFieldParty->field_party_name, ['field-parties/view', 'id' => $model->survey_field_party], ['data-pjax' => '0']);
                }
            ],
            'survey_onshore_offshore',
            'survey_description:ntext',
            'survey_shot_type',
            'survey_acq_type',
            'survey_area_name',
            [
                'attribute' => 'survey_information',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->survey_information, ['surveys/download', 'survey_id' => $model->survey_id], ['data-pjax' => '0']);
                }
            ],

        ],
    ]) ?>

</div>
