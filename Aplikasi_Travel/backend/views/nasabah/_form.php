<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Nasabah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nasabah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekening')->textInput() ?>

    <?= $form->field($model, 'no_kartu')->textInput() ?>

    <?= $form->field($model, 'tanggal_valid')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cvv')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <?= $form->field($model, 'status_kartu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
