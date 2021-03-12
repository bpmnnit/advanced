<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Offdpr */

$this->title = $model->offdpr_id;
$this->params['breadcrumbs'][] = ['label' => 'Offdprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="offdpr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->offdpr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->offdpr_id], [
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
            'offdpr_id',
            'offdpr_date',
            'offdpr_streamer_profile',
            'offdpr_sail_line',
            'offdpr_line_no',
            'offdpr_type',
            'offdpr_direction',
            'offdpr_sp_from',
            'offdpr_sp_to',
            'offdpr_preplot_sp_from',
            'offdpr_preplot_sp_to',
            'offdpr_shots',
            'offdpr_bad_sp',
            'offdpr_shots_acc',
            'offdpr_cmps',
            'offdpr_prime',
            'offdpr_infill',
            'offdpr_chargeable_prime',
            'offdpr_chargeable_infill',
            'offdpr_ros',
            'offdpr_remarks_line:ntext',
            'offdpr_standbyhrs',
            'offdpr_chargeable_standbyhrs',
            'offdpr_remarks_standby:ntext',
            'offdpr_ntbp',
        ],
    ]) ?>

</div>
