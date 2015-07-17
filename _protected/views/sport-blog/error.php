<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$this->title = $name;
// вставим значение что бы не переопред. render для error
$this->params['note'][] = 'Велоспорт - это перемещение по земле с использованием транс-портных средств (велосипедов), движимых мускульной силой человека. Велосипедный спорт (велоспорт) включает в себя такие дисциплины, как гонки на треке, шоссе.';
?>
<div>
    <div class="simpleBox">
        <h2><?= Html::encode($this->title) ?></h2>
<hr><br>
        <h3>
            <?= nl2br(Html::encode($message)) ?>
        </h3>
    </div>
</div>