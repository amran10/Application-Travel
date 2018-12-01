<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cradit */

$this->title = 'Update Cradit: ' . $model->id_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Cradits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembayaran, 'url' => ['view', 'id' => $model->id_pembayaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cradit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
