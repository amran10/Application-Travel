<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hubungin */

$this->title = $model->id_hubungi;
$this->params['breadcrumbs'][] = ['label' => 'Hubungins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hubungi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hubungi], [
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
            'id_hubungi',
            'nama',
            'alamat',
            'email:email',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
