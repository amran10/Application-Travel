<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cradit */

$this->title = 'Create Cradit';
$this->params['breadcrumbs'][] = ['label' => 'Cradits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cradit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
