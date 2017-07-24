<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Artists */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Художники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artists-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            'description:ntext',
            'hide',
            'meta_title',
            'meta_desc:ntext',
            'meta_key',
            'img_link',
        ],
    ]) ?>

</div>
