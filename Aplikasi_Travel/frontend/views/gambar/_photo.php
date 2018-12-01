
<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-lg-3">

<article class="img-shadow" data-key="<?= $model->id_foto; ?>">

    <h2><?= Html::a(Html::img(Yii::getAlias('@imageurl')."/Gambar/".$model->foto, ['class' => 'image-size']), Url::toRoute(['gambar/view', 'id' => $model->id_foto]), ['foto' => $model->foto]); ?>
    </h2>
    <center><h3><?= Html::encode($model->nama); ?></h3></center>

</article>
</div>