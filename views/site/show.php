<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/*<h2><?= widget($news->title) ?></h2>

   <p><?= HtmlPurifier::process($news->text) ?></p>*/
$this->title = 'Новость';
?>

<article class="post">
    <?php echo DetailView::widget([
    'model' => $news,
    'attributes' => [
    'title',                                           // title свойство (обычный текст)
    'description:html',                                // description свойство, как HTML
    [                                                  // name свойство зависимой модели owner
    'label' => 'Owner',
    //'value' => $model->text,
    ],
    'created_at:datetime',                             // дата создания в формате datetime
    ],
    ]);?>
</article>
