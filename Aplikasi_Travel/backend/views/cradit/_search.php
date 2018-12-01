<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CraditSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cradit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pembayaran') ?>

    <?= $form->field($model, 'no_kartu') ?>

    <?= $form->field($model, 'nama_pemilik') ?>

    <?= $form->field($model, 'tanggal_valid') ?>

    <?= $form->field($model, 'cvv') ?>

    <?php // echo $form->field($model, 'nominal') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
