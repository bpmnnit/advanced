<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Postings */

$this->title = 'Posting: '.$model->postingCpf->manpower_name;
$this->params['breadcrumbs'][] = ['label' => 'Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="postings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->posting_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->posting_id], [
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
                'attribute' => 'posting_cpf',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->postingCpf->manpower_name, ['manpowers/view', 'id' => $model->posting_cpf], ['data-pjax' => '0']);
                }
            ],
            'posting_at',
            [
                'attribute' => 'posting_region',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->postingRegion->region_name, ['regions/view', 'id' => $model->posting_region], ['data-pjax' => '0']);
                }
            ],
            'posting_on',
        ],
    ]) ?>

</div>
