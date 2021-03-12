<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Si */

$this->title = 'Create Si';
$this->params['breadcrumbs'][] = ['label' => 'Sis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="si-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
