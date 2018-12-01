<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nasabah */

$this->title = 'Create Nasabah';
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
