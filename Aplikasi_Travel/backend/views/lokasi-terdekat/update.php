<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LokasiTerdekat */

$this->title = 'Update Lokasi Terdekat: ' . $model->id_lokasi;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Terdekats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lokasi, 'url' => ['view', 'id' => $model->id_lokasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lokasi-terdekat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
