<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Paket */

$this->title = $model->id_paket;
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-view">

    


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_paket',
            'jenis_paket',
            'harga',
            [
                'label' => 'Transportasi',
                'value' => $model->transportasis->nama_transportasi,
            ],
            'deskripsi:ntext',
        ],
    ]) ?>

    <p><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Pesan Paket' , ['pemesanan/create', 'id' => $model->id_paket], ['class' => 'btn btn-primary']);?></p>

</div>
