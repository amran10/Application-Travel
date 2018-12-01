<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pemesanan */

$this->title = 'Create Pemesanan';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
