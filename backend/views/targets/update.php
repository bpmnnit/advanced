<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Targets */

$this->title = 'Update Targets: ' . $model->target_id;
$this->params['breadcrumbs'][] = ['label' => 'Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->target_id, 'url' => ['view', 'id' => $model->target_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="targets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
