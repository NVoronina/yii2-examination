<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

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
            
            NavBar::begin([
                'brandLabel' => 'ArtGalleria',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-gradient navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right navbar-color'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index/']],
                    ['label' => 'Магазин', 'url' => ['/shop/categories/']],
                    ['label' => 'О Нас', 'url' => ['/site/about/']],
                    ['label' => 'Художники', 'url' => ['/site/artists/']],
                    ['label' => 'Задать вопрос', 'url' => ['/site/contact/']],
                    ['label' => 'Контакты', 'url' => ['#'],
                        'linkOptions'=>
                            ['data-toggle'=>'modal',
                                'data-target'=>'#contacts',]
                    ],
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
                        .'<li>'
                        . Html::a('Корзина',yii\helpers\BaseUrl::base().'/shop/cart/')
                        . '</li>'
                    )
                ],
            ]);
            NavBar::end();
            Modal::begin([
                'id' => 'contacts',
                'header' => '<h2>Контакты галлереи "ArtGalleria"</h2>',

            ]);

            echo    '
                    <p>Тел: +7 (812) 932-92-32</p>
                    <p>Электронная почта: sale@gmail.com</p>
                    <p>Факс: 880022222222</p>
                    <p>Адрес: Санкт-Петербург, Невский пр., д.2</p>
                    <div class="center-block"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aec4617da9659db49abbf62906b10992c7287d53734a6c7e25ce4dba34e27baff&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script></div>';
            Modal::end();
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
