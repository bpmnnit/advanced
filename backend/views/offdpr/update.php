<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Offdpr */

$this->title = 'Update Offdpr: ' . $model->offdpr_id;
$this->params['breadcrumbs'][] = ['label' => 'Offdprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->offdpr_id, 'url' => ['view', 'id' => $model->offdpr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="offdpr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
