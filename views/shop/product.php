<?php
use yii\widgets\LinkPager;
$this->title = $product->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?=$product->title?></h1>
<div class="col-md-4">
    <img class="product-image" src="<?=yii\helpers\BaseUrl::base() . $product->img[0]?>"/>
    <?php
    if(!empty($product->img[1])) {
        foreach ($product->img as $image) {
            $imgArray[] = "<img class='product-page-image' src='" . yii\helpers\BaseUrl::base() . $image . "'/>";
        }
    }
    ?>
</div>
<div class="col-md-8">
    <p><?=$product->short_desc?></p>
    <p><strong>Описание картины: </strong><?=$product->description?></p>
    <p>Цена: <span class='price'><?=$product->price?> р.</span></p>
    <?if(!Yii::$app->user->isGuest):?>
    <a class='btn btn-danger buy-button' href='<?=Yii::$app->urlManager->createUrl(["shop/add","id" => $product->id])?>'>Купить</a>
    <?endif?>
</div>
