<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Nasabah */

$this->title = 'Update Nasabah: ' . $model->no_rekening;
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_rekening, 'url' => ['view', 'id' => $model->no_rekening]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nasabah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
