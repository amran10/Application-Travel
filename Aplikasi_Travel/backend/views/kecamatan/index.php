<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Kecamatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kecamatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id_kecamatan',
            'kecamatan',
            'keterangan:ntext',
            //'foto:ntext',
            [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Foto',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@imageurl') . "/kecamatan/" . $data['foto'],
                    ['width' => '300px']);
                },
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
