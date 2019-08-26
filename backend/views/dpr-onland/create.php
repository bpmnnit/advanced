<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = 'Create Dpr Onland';
$this->params['breadcrumbs'][] = ['label' => 'Dpr Onlands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpr-onland-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
