<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Transportasi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Paket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_paket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?=
$form->field($model, 'transportasi')->dropDownList(
        ArrayHelper::map(Transportasi::find()->all(),'id_transportasi','nama_transportasi'),
        ['prompt'=>'Pilih Transportasi']
)
?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
