<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Candidates */

$this->title = 'Create Candidates';
$this->params['breadcrumbs'][] = ['label' => 'Candidates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
