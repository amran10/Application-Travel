
<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="img-thumbnail">
<center>
    <h2><?= Html::img(Yii::getAlias('@imageurl')."/About/".$model->foto_about, ['class' => 'image-size']) ?>
    </h2>
    <h4><div align="justify"><?= Html::encode($model->tentang)?></div></h4>

</center>
    
</article>
