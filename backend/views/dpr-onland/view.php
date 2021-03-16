<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = $model->dpr_date;
$this->params['breadcrumbs'][] = ['label' => 'Onland DPR', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dpr-onland-view">

    <h3><?= Html::encode($model->dprFieldParty->field_party_name) ?></h3>
    <h4><?= $model->dpr_date ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dpr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dpr_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create DPR', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dpr_date',
            [
                'attribute' => 'dpr_field_party',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->dprFieldParty->field_party_name, ['field-parties/view', 'id' => $model->dpr_field_party], ['data-pjax' => '0']);
                }
            ],
            [
                'attribute' => 'dpr_si',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->dprSi->si_no . ' ('. $model->dprSi->si_area . ')', ['si/view', 'id' => $model->dpr_si], ['data-pjax' => '0']);
                }
            ],
            'dpr_shots_acc',
            'dpr_shots_rej',
            'dpr_shots_skip',
            'dpr_shots_rep',
            'dpr_shots_rec',
            'dpr_coverage_shots',
            [
                'attribute' => 'dpr_coverage',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['decimal', 4],
            ],
            'dpr_remarks',
        ],
    ]) ?>

</div>
