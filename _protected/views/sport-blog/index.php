<?php
use app\assets\AppAsset;
AppAsset::register($this);

/* @var $this yii\web\View */
$this->params['note'][] = $note;
?>

<!-- Контейнер с контентом -->
<article class="simpleBox">
    <header>
        <h3>О проекте:</h3>
    </header><br>
    <b>Описание проекта:</b>
    <ul>
        <li>Реализует вывод записей (находящихся в БД) по категориям.</li>
        <li>Возможность посмотреть подробно информацию по записи.</li>
        <li>Вывод заметок и возможность вывода новой, без перезагрузки страницы.</li>
        <li>Постраничная разбивка записей с пагинацией соответственно категории.</li>
    </ul><br>
    <b>Технические решения:</b>
    <ul>
        <li>Используется семантическая разметка HTML5.</li>
        <li>Используется вывод "хлебных крошек" с активными URL-переходами.</li>
        <li>Динамическое получение контента из БД, при помощи AJAX.</li>
        <li>Запоминание последней случайной заметки в cookie.</li>
    </ul>
</article>