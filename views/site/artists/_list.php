<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->id; ?>">
    <h3 class="title">
        <?= Html::a(Html::encode($model->name) ." ". Html::encode($model->surname), Url::toRoute(['shop/artist', 'id' => $model->id]), ['title' => $model->name]) ?>
    </h3>
    <div class="text">
        <?=Html::img(["/img/artists/" . $model->img_link],["class" => "img-artist"])?>
        <?=Html::encode($model->description)?>
    </div>
</article>