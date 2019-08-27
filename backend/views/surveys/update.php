<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Surveys */

$this->title = 'Update Surveys: ' . $model->survey_name;
$this->params['breadcrumbs'][] = ['label' => 'Surveys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->survey_name, 'url' => ['view', 'id' => $model->survey_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surveys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
