<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalery */
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\services\DirectionsRequest;

$coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
]);









$marker = new Marker([
    'position' => $coord,
    'title' => $model->id_kecamatan,
]);

$marker->attachInfoWindow(
    new InfoWindow([
        'content' => $model->kecamatan
    ])
);

// Add marker to the map
$map->addOverlay($marker);

$this->title = $model->kecamatan;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .besar {
        height: 250px;
    }
</style>
<center>
<div class="photo-galery-view">
<div class="img-thumbnail">
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => false,
                'value' => Html::img(Yii::getAlias('@imageurl')."/kecamatan/".$model->foto, ['width' => '200px']),
                'format' => 'raw'
            ],
        ],
    ]) ?>
</div>
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'nama',
            [
                'label' => 'kecamatan',
                'value' => $model->kecamatan,

               
            ],
            
            'keterangan',
        ],
    ]) ?>
</div>
</div>
</div>
</center>
<div class="col-lg-6">
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Peta',
                'value' => $model->lat==''?'':$map->display(),
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>

<div class="col-lg-6">
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
      .button_maps {
            text-decoration: none;
            border: 1px solid #ccc;
            padding: 10px 15px;
            -moz-border-radius: 11px;
            -webkit-border-radius: 11px;
            border-radius: 11px;
            text-shadow: 0 1px 0 #FFFFFF;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button_maps:hover {
            background-color: #4CAF50; /* Green */
            color: white;
        }
    </style>


    <!-- akhir dari Bagian js -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyARp1GaL-_8RdwUXyOdafKdrvyDW-TJER0" type="text/javascript"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script>

    var marker;
    var markers = [];
      function initializee() {
        var styleArray = [
            {
              featureType: 'all',
              stylers: [
                { saturation: -80 }
              ]
            },{
              featureType: 'road.arterial',
              elementType: 'geometry',
              stylers: [
                { hue: '#00ffee' },
                { saturation: 50 }
              ]
            },{
              featureType: 'poi.business',
              elementType: 'labels',
              stylers: [
                { visibility: 'off' }
              ]
            }
          ];

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          zoom: 2,
          styles: styleArray
        }

        // Pembuatan petanya
        var map1 = new google.maps.Map(document.getElementById('map1'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
$conn=mysqli_connect("localhost","root","");
        mysqli_select_db($conn,'proyek1');

        $sql="SELECT * FROM lokasi_terdekat where id_kecamatan =".$model->id_kecamatan."";

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
{
            $id_hotel = $row['id_lokasi'];
            $nama = $row['nama_lokasi'];
            $lat = $row['lat'];
            $lng = $row['lng'];


            echo ("addMarker($lat, $lng, '$nama');\n");
}
     ?>
        // Proses membuat marker
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map1,
                    position: lokasi,
                    zoom: 2
            });
            //markers.push(marker);
            
            map1.fitBounds(bounds);
            bindInfoWindow(marker, map1, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
              //  imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map1, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map1, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initializee);

    </script>

</head>
<body onload="initializee()">

<div class="container" style="margin-top:10px">

                    <div class="panel-body">
                        <div id="map1" style="width: 500px; height: 500px;"></div>
             </div>
    </div>
</body>
</html>
</div>

