<?php
use yii\widgets\LinkPager;
$this->title = 'Магазин';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Магазин ArtGalleria</h1>
<div class="col-md-3">
    <ul class="menu">
<?php foreach($categories as $category):?>
        <li><a href="<?=Yii::$app->urlManager->createUrl(["shop/category","id" => $category->id])?>"><?=$category->title?></a></li>
<?php endforeach ?>
    </ul>
</div>
<div class="col-md-9">
    <ul class="product">
    <?php foreach($products as $product):?>
        <li>
            <a href='<?=Yii::$app->urlManager->createUrl(["shop/product","id" => $product->id])?>'>
                <img class='mini-image' src='<?=yii\helpers\BaseUrl::base() . $product->img[0]?>'/>
                <h3><?=$product->title?></h3>
                <p><?=$product->short_desc?></p>
                <span class='price'><?=$product->price?> р.</span>
            </a>
                <?if(!Yii::$app->user->isGuest):?>
                    <a class='btn btn-danger buy-button' href='<?=Yii::$app->urlManager->createUrl(["shop/add","id" => $product->id])?>'>Купить</a>
                <?endif?>
        </li>
    <?endforeach?>
    </ul>
    <div class="paging">
        <?php
            echo LinkPager::widget(['pagination' => $pagination]);
        ?>
    </div>
</div>
