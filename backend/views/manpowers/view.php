<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Manpowers */

$this->title = $model->manpower_name;
$this->params['breadcrumbs'][] = ['label' => 'Manpowers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manpowers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->manpower_cpf], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->manpower_cpf], [
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
            'manpower_cpf',
            'manpower_name',
            'manpower_charge',
            'manpower_mobile_number',
            'manpower_create_date',
            'manpower_level',
            'manpower_discipline',
            'manpower_designation',
        ],
    ]) ?>

</div>
