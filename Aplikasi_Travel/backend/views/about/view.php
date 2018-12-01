<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\About */

$this->title = $model->id_about;
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_about], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_about], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            [
                'label' => 'Foto',
                'value' => Html::img(Yii::getAlias('@imageurl')."/About/".$model->foto_about, ['width' => '300px']),
                'format' => 'raw'
            ],
           //'id_about',
            //'foto_about:ntext',
            'tentang:ntext',
        ],
    ]) ?>

</div>
