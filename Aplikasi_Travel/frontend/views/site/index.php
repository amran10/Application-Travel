<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="w3-container">
  <h2><marquee>Selamat Datang Di Web Aplikasi Pariwisata Kabupaten Langkat</marquee></h2>
  <p>Langkat mempunya banyak destinasi tempat wisata mulai dari wisata bahari atauoun wisata alamnya yang indah.
  Disini anda juga dapat melihat berita Wisata terupdate yang ada di kabupaten langkat .</p>
</div>

<div class="w3-content" style="max-width:800px;position:relative">

<div class="w3-display-container mySlides">
  <img src="img/bukit.jpg" style="width:100%">
  <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black">
    Bukit Lawang, Bahorok
  </div>
</div>



<div class="w3-display-container mySlides">
   <img src="img/hah.jpg" style="width:100%">
  <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
    Bukit Lawang, Bahorok
  </div>
</div>

<div class="w3-display-container mySlides">
   <img src="img/masjid azizi.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
    Masjid Azizi , Tanjung Pura
  </div>
</div>




</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_berita',
          ]) ?>
  </div>
</div>
