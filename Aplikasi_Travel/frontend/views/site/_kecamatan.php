
<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>
<article class="img-thumbnail col-lg-6" data-key="<?= $model->id_kecamatan; ?>">
<div class="col-lg-6">
    <h2><?= Html::a(Html::img(Yii::getAlias('@imageurl')."/kecamatan/".$model->foto, ['class' => 'image-size']), Url::toRoute(['site/viewkecamatan', 'id' => $model->id_kecamatan]), ['foto' => $model->foto]); ?>
    </h2>
</div>
<div class="row">

    <h3><?= Html::encode($model->kecamatan); ?></h3>
<div class="col-lg-4"> 
     <?php  
                echo Html::a('Detail' , ['site/viewkecamatan', 'id' => $model->id_kecamatan], ['class' => 'btn btn-primary']);
                ?>

                </div>
</div>
    
</article>
</p>