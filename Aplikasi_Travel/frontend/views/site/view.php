<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalery */

$this->title = $model->id_berita;
$this->params['breadcrumbs'][] = ['label' => 'berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="berita">
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => false,
                'value' => Html::img(Yii::getAlias('@imageurl')."/Berita/".$model->foto_berita, ['width' => '200px']),
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
           /*[
                'label' => 'berita',
                'value' => $model->berita,
               
            ],*/

           
            'tgl_berita',
            'berita',
        ],
    ]) ?>
</div>
</div>
</center>

<?php
$con=mysqli_connect("localhost","root","");
$conn=mysqli_connect("localhost","root","");
?>
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
    
    <script>

    var marker;
    var markers = [];
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          zoom: 2
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
        mysqli_select_db($con,'proyek1');

        $sql="SELECT * FROM berita where id_berita = ".$model->id_berita."";

        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
{
            $id_hotel = $row['id_berita'];
            $nama = $row['id_berita'];
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
                    map: map,
                    position: lokasi,
                    zoom: 2
            });
            //markers.push(marker);
            
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
            //var markerCluster = new MarkerClusterer(map, markers,
            //{
            //    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">

<div class="container" style="margin-top:10px">

                    <div class="panel-body">
                        <div id="map" style="width: 1070px; height: 500px;"></div>
             </div>
    </div>
</body>
</html>