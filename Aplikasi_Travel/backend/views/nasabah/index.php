<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NasabahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nasabahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nasabah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_rekening',
            'no_kartu',
            'tanggal_valid',
            'nama',
            'cvv',
            'saldo',
            // 'status_kartu',
            // 'bank_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
