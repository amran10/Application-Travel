<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hubungin */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Hubungin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php  
                echo Html::a('Home' , ['site/index'], ['class' => 'btn btn-primary']);
                ?>
       
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'nama',
            'alamat',
            'email:email',
            'notel',
            'keterangan:ntext',
        ],
    ]) ?>

</div>
