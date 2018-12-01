<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hubungin */

$this->title = 'Create Hubungin';
$this->params['breadcrumbs'][] = ['label' => 'Hubungins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
