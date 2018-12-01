<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LokasiTerdekatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokasi Terdekats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lokasi-terdekat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lokasi Terdekat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_lokasi',
            'nama_lokasi',
            'id_kecamatan',
            'lat',
            'lng',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
