<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gambar */

$this->title = 'Update Gambar: ' . $model->id_foto;
$this->params['breadcrumbs'][] = ['label' => 'Gambars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_foto, 'url' => ['view', 'id' => $model->id_foto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gambar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
