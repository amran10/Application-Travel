<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Nasabah */

$this->title = $model->no_rekening;
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->no_rekening], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->no_rekening], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_rekening',
            'no_kartu',
            'tanggal_valid',
            'nama',
            'cvv',
            'saldo',
            'status_kartu',
            'bank_id',
        ],
    ]) ?>

</div>
