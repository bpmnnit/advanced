<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Manpowers */

$this->title = 'Update Manpowers: ' . $model->manpower_cpf;
$this->params['breadcrumbs'][] = ['label' => 'Manpowers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manpower_cpf, 'url' => ['view', 'id' => $model->manpower_cpf]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manpowers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
