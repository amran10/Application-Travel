<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HubunginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hubungins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?php  
                echo Html::a('Beranda' , ['site/index'], ['class' => 'btn btn-primary']);
                ?>
      
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hubungi',
            'nama',
            'alamat',
            'email:email',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
