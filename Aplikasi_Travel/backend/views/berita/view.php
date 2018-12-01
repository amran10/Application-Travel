<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
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
    'title' => $model->id_berita,
]);

$marker->attachInfoWindow(
    new InfoWindow([
        'content' => $model->tgl_berita
    ])
);

// Add marker to the map
$map->addOverlay($marker);

$this->title = $model->id_berita;
$this->params['breadcrumbs'][] = ['label' => 'Beritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_berita], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_berita], [
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
            
            [
                'label' => 'foto berita',
                'value' => Html::img(Yii::getAlias('@imageurl')."/Berita/".$model->foto_berita, ['width' => '300px']),
                'format' => 'raw'
            ],

            'berita:ntext',
            'tgl_berita',
            [
                'attribute' => 'Peta',
                'value' => $model->lat==''?'':$map->display(),
                'format' => 'raw',
            ],
            
        ],
    ]) ?>

</div>
