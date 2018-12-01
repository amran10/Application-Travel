<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Hubungin */

$this->title = ' Hubungin Kami';
$this->params['breadcrumbs'][] = ['label' => 'Hubungins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
