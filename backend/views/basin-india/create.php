<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasinIndia */

$this->title = 'Create Basin India';
$this->params['breadcrumbs'][] = ['label' => 'Basin Indias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basin-india-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
