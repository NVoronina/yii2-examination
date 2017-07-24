<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните форму регистрации или перейдите к <?=Html::a('авторизации', ["site/login"])?>:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'reg-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label("Имя") ?>
    <?= $form->field($model, 'last_name')->textInput()->label("Фамилия") ?>
    <?= $form->field($model, 'email')->textInput()->label("Email") ?>
    <?= $form->field($model, 'username')->textInput()->label("Логин") ?>
    <?= $form->field($model, 'password_repeat')->passwordInput()->label("Пароль") ?>
    <?= $form->field($model, 'password')->passwordInput()->label("Повторите пароль") ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
