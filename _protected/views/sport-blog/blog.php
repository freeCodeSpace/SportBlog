<?php
use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
// Задание параметра breadcrumbs, в соотв. с действ. контрол.
switch ($this->context->action->id) {
    case 'about-sport':
        $this->title = 'О спорте';
        break;
    case 'body-building':
        $this->title = 'Бодибилдинг';
        break;
    case 'all-sport':
        $this->title = 'Всё содержание';
        break;
    default:
        break;
}
$this->params['breadcrumbs'][] = $this->title;
$this->params['note'][] = $note;
$PageSize = $dataProvider->pagination->defaultPageSize;
if ($PageSize != 0) {
    $lastPageCount = ceil( ( $dataProvider->getTotalCount() ) / $PageSize );
} else {
    $lastPageCount = '|';
}
?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'blog_echo',
    'layout' => '{items}<div id="paginator">{pager}</div>', // обрамление для центрирования пагинации

    'pager' => [
        'firstPageLabel' => 1,
        'lastPageLabel' => $lastPageCount,
        'maxButtonCount' => 2,
    ],

]); ?>