<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Manpowers */

$this->title = 'Create Manpowers';
$this->params['breadcrumbs'][] = ['label' => 'Manpowers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manpowers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
