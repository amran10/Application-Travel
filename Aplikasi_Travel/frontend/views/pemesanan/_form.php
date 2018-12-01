<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemesan')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'nama_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_pemasan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notel')->textInput() ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'paket_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tanngal')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
