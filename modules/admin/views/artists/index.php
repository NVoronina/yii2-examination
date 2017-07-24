<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtistsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Художники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artists-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить художника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'description:ntext',
            'hide',
            // 'meta_title',
            // 'meta_desc:ntext',
            // 'meta_key',
            // 'img_link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
