<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transportasi */

$this->title = 'Update Transportasi: ' . $model->id_transportasi;
$this->params['breadcrumbs'][] = ['label' => 'Transportasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transportasi, 'url' => ['view', 'id' => $model->id_transportasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transportasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
