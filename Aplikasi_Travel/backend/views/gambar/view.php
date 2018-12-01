<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Gambar */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

$coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
]);

$marker = new Marker([
    'position' => $coord,
    'title' => $model->id_foto,
]);

$marker->attachInfoWindow(
    new InfoWindow([
        'content' => $model->keterangan
    ])
);

// Add marker to the map
$map->addOverlay($marker);

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Gambars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gambar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_foto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_foto], [
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
            'keterangan',
            [
                'label' => 'Foto',
                'value' => Html::img(Yii::getAlias('@imageurl')."/Gambar/".$model->foto, ['width' => '300px']),
                'format' => 'raw'
            ],
            'nama',
            
            [
                'label' => 'Peta',
                'value' => $model->lat==''?'':$map->display(),
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>
