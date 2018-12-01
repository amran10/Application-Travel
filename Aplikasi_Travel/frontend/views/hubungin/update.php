<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hubungin */

$this->title = 'Update Hubungin: ' . $model->id_hubungi;
$this->params['breadcrumbs'][] = ['label' => 'Hubungins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hubungi, 'url' => ['view', 'id' => $model->id_hubungi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hubungin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
