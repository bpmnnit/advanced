<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Si */

$this->title = 'Update Si: ' . $model->si_id;
$this->params['breadcrumbs'][] = ['label' => 'Sis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->si_id, 'url' => ['view', 'id' => $model->si_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="si-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
