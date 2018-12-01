<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Paket */

$this->title = 'Pembayaran via Kartu Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Kredit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('pembayarankredit', [
        'model' => $model,
    ]) ?>

</div>
