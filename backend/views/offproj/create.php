<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Offproj */

$this->title = 'Create Offproj';
$this->params['breadcrumbs'][] = ['label' => 'Offprojs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offproj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
