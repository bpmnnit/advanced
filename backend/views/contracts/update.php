<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contracts */

$this->title = 'Update Contracts: ' . $model->contract_id;
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contract_id, 'url' => ['view', 'id' => $model->contract_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contracts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
