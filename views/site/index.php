<?php

/* @var $this yii\web\View */

$this->title = 'Магазин картин "ArtGalleria"';
?>
<div class="site-index">
    <div class="body-content">
            <div class="col-md-12">
            <?php echo yii\bootstrap\Carousel::widget([
                'items' => [

                    '<img class="stream" src="'. yii\helpers\BaseUrl::base() .'/img/products/IMG_5990.jpg"/>',
                    '<img class="stream" src="'. yii\helpers\BaseUrl::base() .'/img/products/P1130660.jpg"/>',
                    '<img class="stream" src="'. yii\helpers\BaseUrl::base() .'/img/products/full____________________________________________________.jpg"/>',
                ],

                'options' => ['class' => 'carousel slide'],

                'controls' => ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Предидущая</span>',
                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Следующая</span>',
                ],


            ]);?>
            </div>
            <div class="col-md-9">
                <h2>Новинки</h2>
                <ul class="product">
                    <?php foreach($products as $product):?>
                        <li>
                            <a href='<?=Yii::$app->urlManager->createUrl(["shop/product","id" => $product->id])?>'>
                            <img class='mini-image' src='<?=yii\helpers\BaseUrl::base() . $product->img[0]?>'/>
                            <h4><?=$product->title?></h4>
                            <p><?=$product->short_desc?></p>
                            </a>
                        </li>
                    <?endforeach?>
                </ul>
            </div>
    </div>
</div>
