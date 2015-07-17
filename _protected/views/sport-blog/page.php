<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
// Задание параметра breadcrumbs, в соотв. с действ. контрол.
switch ($this->context->action->id) {
    case 'about-sport':
        $this->title =  ['label' => 'О спорте', 'url' => ['/sport-blog/about-sport']];
        break;
    case 'body-building':
        $this->title =  ['label' => 'Бодибилдинг', 'url' => ['/sport-blog/body-building']];
        break;
    case 'all-sport':
        $this->title =  ['label' => 'Всё содержание', 'url' => ['/sport-blog/all-sport']];
        break;
    default:
        break;
}
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $record->title;
$this->params['note'][] = $note;
?>
<div id="recordBox">
    <img src="<?= Yii::$app->homeUrl; ?>img/<?= $record->img; ?>.jpg" alt="" class="ImgIco">
    <header><?= $record->title; ?></header>
        <?= $record->content; ?>
</div>