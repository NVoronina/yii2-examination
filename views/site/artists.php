<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Художники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-news">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    echo ListView::widget([
        'dataProvider' => $artists,
        'itemView' => 'artists/_list',
        'options' => [
            'tag' => 'div',
        ],
        /*'itemView' => function ($model, $key, $index, $widget) {


            return $this->render('_list', ['model' => $model]);
        },*/
        'layout' => "{pager}\n{summary}\n{items}\n{pager}",
        'summary' => 'Показано {count} из {totalCount}',
        'summaryOptions' => [
            'tag' => 'span',
            'class' => 'my-summary'
        ],

        'itemOptions' => [
            'tag' => 'div',
            'class' => 'news-item',
        ],

        'emptyText' => '<p>Список пуст</p>',
        'emptyTextOptions' => [
            'tag' => 'p'
        ],

        'pager' => [
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'nextPageLabel' => 'Следующая',
            'prevPageLabel' => 'Предыдущая',
            'maxButtonCount' => 5,
        ],

    ]);
?>
</div>