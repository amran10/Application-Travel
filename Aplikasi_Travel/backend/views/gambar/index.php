<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GambarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gambars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gambar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gambar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_foto',
            'nama',
            [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Foto',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@imageurl') . "/Gambar/" . $data['foto'],
                    ['width' => '300px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
