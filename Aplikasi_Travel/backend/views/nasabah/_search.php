<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NasabahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nasabah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_rekening') ?>

    <?= $form->field($model, 'no_kartu') ?>

    <?= $form->field($model, 'tanggal_valid') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'cvv') ?>

    <?php // echo $form->field($model, 'saldo') ?>

    <?php // echo $form->field($model, 'status_kartu') ?>

    <?php // echo $form->field($model, 'bank_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
