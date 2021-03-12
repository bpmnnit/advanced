<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetVsAchievement */

$this->title = 'Update Target Vs Achievement: ' . $model->idTarget_Achievement;
$this->params['breadcrumbs'][] = ['label' => 'Target Vs Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTarget_Achievement, 'url' => ['view', 'id' => $model->idTarget_Achievement]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="target-vs-achievement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
