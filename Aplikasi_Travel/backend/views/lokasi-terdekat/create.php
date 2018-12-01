<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LokasiTerdekat */

$this->title = 'Create Lokasi Terdekat';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Terdekats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lokasi-terdekat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
