<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cradit */

$this->title = $model->id_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Cradits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cradit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pembayaran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pembayaran], [
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
            'id_pembayaran',
            'no_kartu',
            'nama_pemilik',
            'tanggal_valid',
            'cvv',
            'nominal',
            'keterangan',
        ],
    ]) ?>

</div>
