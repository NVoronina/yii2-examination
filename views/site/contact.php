<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;


$this->title = 'Задать вопрос';
$this->params['breadcrumbs'][] = $this->title;
$formShow = ActiveForm::begin();
?>
<h1>Задайте свой вопрос</h1>

<?php
if(!empty($notice)) {
    if ($notice['type'] == 1) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-success',
            ],
            'body' => $notice['text'],
        ]);
    } elseif ($notice['type'] == 0) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-warning',
            ],
            'body' => $notice['text'],
        ]);
    }
}
echo $formShow->field($model, "name")->label("Имя");
echo $formShow->field($model, "email")->label("Контактный email");
echo $formShow->field($model, "subject")->label("Тема");
echo $formShow->field($model, "body")->label("Текст вопроса");
echo Html::submitButton("Отправить", ["class" => "btn btn-success"]);
?>


<?php ActiveForm::end();?>

