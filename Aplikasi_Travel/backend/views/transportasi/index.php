<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransportasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transportasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transportasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_transportasi',
            'nama_transportasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
