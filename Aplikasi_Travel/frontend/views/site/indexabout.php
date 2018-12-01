<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => 'view_about',
              'summary' => false,
          ]) ?>
  </div>
</div>
