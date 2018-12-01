<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pemesan') ?>

    <?= $form->field($model, 'nama_pemesan') ?>

    <?= $form->field($model, 'alamat_pemesan') ?>

    <?= $form->field($model, 'email_pemasan') ?>

    <?= $form->field($model, 'notel') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'paket_id') ?>

    <?php // echo $form->field($model, 'tanngal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
