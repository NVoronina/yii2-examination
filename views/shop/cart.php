<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = "Корзина";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-9">
    <h1><?=$this->title?></h1>
    <?if(!empty($cart)):?>
    <ul class="cart">
        <?php foreach($cart as $product):?>
            <li><?=$product->title?> | <?=$product->price?> р.</li>
        <?endforeach?>
    </ul>
    <a class="btn btn-success" href='<?=Yii::$app->urlManager->createUrl(["shop/orders","id" => $product->id])?>'>Перейти к оформлению заказа</a>
    <?else:?>
    <p>Ваша корзина пуста</p>
    <?endif?>
</div>