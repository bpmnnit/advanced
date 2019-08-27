<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldParties */

$this->title = $model->field_party_name;
$this->params['breadcrumbs'][] = ['label' => 'Field Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="field-parties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->field_party_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->field_party_id], [
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
            'field_party_name',
            'field_party_type',
            [
                'attribute' => 'field_party_chief',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->fieldPartyChief->manpower_name, ['manpowers/view', 'id' => $model->field_party_chief], ['data-pjax' => '0']);
                }
            ],
            [
                'attribute' => 'field_party_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->fieldPartyRegion->region_name, ['regions/view', 'id' => $model->field_party_region], ['data-pjax' => '0']);
                }
            ],
        ],
    ]) ?>

</div>
