<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = 'Update Dpr Onland: ' . $model->dpr_id;
$this->params['breadcrumbs'][] = ['label' => 'Dpr Onlands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dpr_id, 'url' => ['view', 'id' => $model->dpr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dpr-onland-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
