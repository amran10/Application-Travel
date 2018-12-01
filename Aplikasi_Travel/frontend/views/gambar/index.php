<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PhotoGalerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galery Foto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_photo',
          ]) ?>
  </div>
</div>
