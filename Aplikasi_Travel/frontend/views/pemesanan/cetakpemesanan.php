<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<p><b><h3 align="center">Orlando.com Travelindo</h3></b></p>
<p align="center">Ini adalah bukti pemesanan anda!</p>
<p></p>
<p></p>
<p></p>
<p></p>
<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
  	$kode = $x->id_pemesan;
    $nama = $x->nama_pemesan;
    $alamat = $x->alamat_pemesan;
    $email = $x->email_pemasan;
    $notel = $x->notel;
    $status = $x->status;
    $tanggal = $x->tanngal;
    $jenis = $x->paket->jenis_paket;
    $harga = $x->paket->harga;
    $transportasi = $x->paket->transportasis->nama_transportasi;
}

?>

<b><p align="center"><font size="5">Status Pembayaran : <i><?= $status ?></i></font></p></b>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Kode Pemesanan</th>
      <th><?= $kode ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <p><b><?= $nama ?></b></p>
        <p><?= $alamat ?></p>
        <p><?= $email ?></p>
        <p>Tanggal Pesan : <?= Yii::$app->formatter->asDate($tanggal, 'dd MMM yyyy') ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Jenis Paket</th>
      <th>No Telepon</th>
      <th>Transportasi</th>
      <th>Harga</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $jenis ?></th>
      <td><?= $notel ?></td>
      <td><?= $transportasi ?></td>
      <td><?= Yii::$app->formatter->asCurrency($harga) ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <th>Total :</th>
      <th><?= Yii::$app->formatter->asCurrency($harga) ?></th>
    </tr>
  </tbody>
</table>

