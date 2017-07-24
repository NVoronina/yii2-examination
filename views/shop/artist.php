<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = Html::encode($info->name). " " .Html::encode($info->surname);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3">
    <ul class="menu">
        <?php foreach($categories as $category):?>
            <li><a href="<?=Yii::$app->urlManager->createUrl(["shop/category","id" => $category->id])?>"><?=$category->title?></a></li>
        <?php endforeach ?>
    </ul>
</div>
<div class="col-md-9">
    <h1><?=$this->title?></h1>
    <p><?=Html::encode($info->description)?></p>
    <ul class="product">
        <?php foreach($products as $product){
            echo "<li>
                <a href='". Yii::$app->urlManager->createUrl(["shop/product","id" => $product->id]) ."'>
                <img class='mini-image' src='". yii\helpers\BaseUrl::base() . $product->img[0]."'/>
                <h3>$product->title</h3>
                <p>$product->short_desc</p>
                </a>
              </li>";
        }
        ?>
    </ul>
    <div class="paging">
        <?php
        echo LinkPager::widget(['pagination' => $pagination]);
        ?>
    </div>
</div>
