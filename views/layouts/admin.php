<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\components\Helper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="bg-image">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        $menuItems =  [
            ['label' => 'Главная', 'url' => ['/admin/']],
            ['label' => 'Товары', 'url' => ['/admin/products']],
            ['label' => 'Категории', 'url' => ['/admin/categories']],
            ['label' => 'Пользователи', 'url' => ['/rbac/user']],
            ['label' => 'Художники', 'url' => ['/admin/artists/']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login/'],
                'linkOptions'=> ['class'=>'enter-site']
            ]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout/'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
        NavBar::begin([
            'brandLabel' => 'ArtGalleria',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-gradient navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right navbar-color'],
            'items' => Helper::filter($menuItems),
        ]);
        NavBar::end();
        ?>

        <div class="container main">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; © 2013-<?= date('Y') ?> | ARTGALLERIA.RU Все права защищены / All rights reserved</p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
