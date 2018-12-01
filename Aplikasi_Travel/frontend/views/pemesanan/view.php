<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pemesanan */

$this->title = $model->id_pemesan;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <center><?php if ($model->status=='Belum Bayar') { 
            echo Html::a('Bayar via Kartu Kredit', ['pembayarankredit', 'id' => $model->id_pemesan], ['class' => 'btn btn-primary']);
            } else {
                echo '';
                } ?></center>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pemesan',
            'nama_pemesan',
            'alamat_pemesan',
            'email_pemasan:email',
            'notel',
            'status',
            [
                'label' => 'Jenis Paket',
                'value' => $model->paket->jenis_paket,
            ],
            [
                'label' => 'Transportasi',
                'value' => $model->paket->transportasis->nama_transportasi,
            ],
            [
                'label' => 'Tanggal Pemesanan',
                'value' => Yii::$app->formatter->asDate($model->tanngal, 'dd MMMM yyyy'),
            ],
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->paket->harga),
            ],
        ],
    ]) ?>

    <center><?= Html::a('Download Bukti Pemesanan', ['cetakpemesanan', 'id' => $model->id_pemesan], ['class' => 'btn btn-primary']); ?></center>

</div>
