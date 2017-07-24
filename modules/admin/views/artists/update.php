<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artists */

$this->title = 'Обновить информацию о художнике: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Художники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="artists-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
