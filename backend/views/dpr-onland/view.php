<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = $model->dpr_id;
$this->params['breadcrumbs'][] = ['label' => 'Dpr Onlands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dpr-onland-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dpr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dpr_id], [
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
        ],
    ]) ?>

</div>
