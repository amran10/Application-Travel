<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Kecamatan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_kecamatan',
          ]) ?>
  </div>
</div>

