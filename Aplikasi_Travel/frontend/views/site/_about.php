
<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>
<article class="img-thumbnail col-lg-6" data-key="<?= $model->id_about; ?>">
<div class="col-lg-6">
    <h2><?= Html::a(Html::img(Yii::getAlias('@imageurl')."/About/".$model->foto_about, ['class' => 'image-size']), Url::toRoute(['site/view', 'id' => $model->id_about]), ['foto' => $model->foto_about]); ?>
    </h2>
</div>
<div class="row">

   
<div class="col-lg-4"> 
     <?php  
                echo Html::a('Detail' , ['berita/view', 'id' => $model->id_about], ['class' => 'btn btn-primary']);
                ?>

                </div>
</div>
    
</article>
</p>