<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetVsAchievement */

$this->title = 'Create Target Vs Achievement';
$this->params['breadcrumbs'][] = ['label' => 'Target Vs Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-vs-achievement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
