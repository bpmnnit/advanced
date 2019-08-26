<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldParties */

$this->title = $model->field_party_id;
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
            'field_party_id',
            'field_party_name',
            'field_party_type',
            'field_party_region',
            //'field_party_chief',
            [
                'attribute' => 'field_party_chief',
                'value' => 'fieldPartyChief.manpower_name',

            ],
            'field_party_create_date',
        ],
    ]) ?>

</div>
