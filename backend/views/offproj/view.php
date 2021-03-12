<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Offproj */

$this->title = $model->offproj_id;
$this->params['breadcrumbs'][] = ['label' => 'Offprojs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="offproj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->offproj_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->offproj_id], [
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
            'offproj_id',
            'offproj_area',
            'offproj_contract',
            'offproj_vessel',
            'offproj_contractor',
            'offproj_start_date',
            'offproj_end_date',
            'offproj_mob_start_date',
            'offproj_mob_end_date',
            'offproj_volume',
            'offproj_source_interval',
            'offproj_sail_line_interval',
            'offproj_streamer_length',
            'offproj_receiver_interval',
            'offproj_shot_point_interval',
            'offproj_source_array',
            'offproj_streamers',
            'offproj_record_length',
            'offproj_prime',
            'offproj_infill_cap',
            'offproj_prefix',
            'offproj_direction_x',
            'offproj_direction_y',
            'offproj_streamer_profile',
            'offproj_planned_completion_days',
        ],
    ]) ?>

</div>
