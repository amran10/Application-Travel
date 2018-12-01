
<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<p>
<article class="img-thumbnail col-lg-6" data-key="<?= $model->id_berita; ?>">
<div class="col-lg-6">
    <h2><?= Html::a(Html::img(Yii::getAlias('@imageurl')."/Berita/".$model->foto_berita, ['class' => 'image-size']), Url::toRoute(['site/view', 'id' => $model->id_berita]), ['foto' => $model->foto_berita]); ?>
    </h2>
</div>
<div class="row">

    <h3><?= Html::encode($model->tgl_berita); ?></h3>

    
    <h3><?= Html::encode($model->Getruncatedberita()); ?></h3>

<div class="col-lg-4"> 
     <?php  
                echo Html::a('Baca Selengkapnya >' , ['site/view', 'id' => $model->id_berita], ['class' => 'btn btn-primary']);
                ?>

                </div>
</div>
    
</article>
</p>