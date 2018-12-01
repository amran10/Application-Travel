<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

//use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
    $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
        'id_berita',
            //'foto_berita:ntext',
            'berita:ntext',
            'tgl_berita',

            [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Foto Berita',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@imageurl') . "/Berita/" . $data['foto_berita'],
                    ['width' => '300px']);
                },
            ],
    ];
    ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_berita',
            //'foto_berita:ntext',
            'berita:ntext',
            'tgl_berita',

            [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Foto Berita',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@imageurl') . "/Berita/" . $data['foto_berita'],
                    ['width' => '300px']);
                },
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
