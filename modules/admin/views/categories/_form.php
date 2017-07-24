<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label("Заголовок") ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label("Описание") ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true])->label("Мета заголовок") ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6])->label("Мета описание") ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true])->label("Мета ключевые слова") ?>

    <?//= $form->field($model, 'hide')->textInput() ?>

    <?//= $form->field($model, 'parent_category_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
