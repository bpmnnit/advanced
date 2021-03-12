<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contracts */

$this->title = $model->contract_id;
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contracts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->contract_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->contract_id], [
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
            'contract_id',
            'contract_field_season',
            'contract_tender_number',
            'contract_tender_type',
            'contract_survey_type',
            'contract_description',
            'contract_area',
            'contract_quantum',
            'contract_basin',
            'contract_region',
            'contract_block',
            'contract_contactor',
            'contract_awarded_value',
            'contract_start_date',
            'contract_end_date',
            'contract_remarks',
        ],
    ]) ?>

</div>
