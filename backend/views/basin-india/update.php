<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasinIndia */

$this->title = 'Update Basin India: ' . $model->idbasin_india;
$this->params['breadcrumbs'][] = ['label' => 'Basin Indias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbasin_india, 'url' => ['view', 'id' => $model->idbasin_india]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basin-india-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
