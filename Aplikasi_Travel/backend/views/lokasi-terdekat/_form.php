<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Kecamatan;

/* @var $this yii\web\View */
/* @var $model backend\models\LokasiTerdekat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lokasi-terdekat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kecamatan')->widget(Select2::classname(),[
    	'data'=> ArrayHelper::map(Kecamatan::find()->all(),'id_kecamatan','kecamatan'),
    	'language'=>'en',
    	'options'=>['placeholder'=>'pilih Kecamatan'],
    	'pluginOptions'=>[
    		'allowClear'=> True
    		],]); ?>

    <?= \ibrarturi\latlngfinder\LatLngFinder::widget([
	    'model' => $model,              // model object
	    'latAttribute' => 'lat',        // Latitude attribute
	    'lngAttribute' => 'lng',        // Longitude attribute
	    'mapCanvasId' => 'map',         // Map Canvas id
	    'mapWidth' => 450,              // Map Canvas width
	    'mapHeight' => 300,             // Map Canvas mapHeight
	    'defaultZoom' => 8,             // Default zoom for the map
	    'enableZoomField' => false,      // True: for assigning zoom values to the zoom field, False: Do not assign zoom value to the zoom field
	]); ?>

    <?= $form->field($model, 'lat')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
