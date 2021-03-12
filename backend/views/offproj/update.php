<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Offproj */

$this->title = 'Update Offproj: ' . $model->offproj_id;
$this->params['breadcrumbs'][] = ['label' => 'Offprojs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->offproj_id, 'url' => ['view', 'id' => $model->offproj_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="offproj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
