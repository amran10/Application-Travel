<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
      $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Berita', 'url' => ['/berita']],
        ['label' => 'Gambar', 'url' => ['/gambar']],
        ['label' => 'Kecamatan', 'url' => ['/kecamatan']],
        ['label' => 'Lokasi Terdekat', 'url' => ['/lokasi-terdekat']],
        ['label' => 'Hubungi', 'url' => ['/hubungin']],
        ['label' => 'About', 'url' => ['/about']],
        ['label' => 'Nasabah', 'url' => ['/nasabah']],
       
       
        [
            'label' => 'Pemesanan',
            'items' => [
               
                 ['label' => 'Pemesanan', 'url' => ['/pemesanan']],
                 ['label' => 'Transportasi', 'url' => ['/transportasi']],
                 ['label' => 'Paket', 'url' => ['/paket']],
                 
            ],
        ],

        [
            'label' => 'Bank',
            'items' => [
               
                 ['label' => 'Bank', 'url' => ['/bank']],
                 ['label' => 'Transfer', 'url' => ['/transfer']],
                 ['label' => 'Cradit', 'url' => ['/cradit']],
            ],
        ],
    ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
