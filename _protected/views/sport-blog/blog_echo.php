<?php
use yii\helpers\Html;
?>
<article class="contentBox">
    <img src="<?= Yii::$app->homeUrl; ?>img/<?= $model->img_ico; ?>.jpg" alt="" class="ImgIco">
    <header><?= $model->title; ?></header>
    <p class="contentText">
        <?= $model->description; ?>
        <?= Html::a('... читать полностью', ["/" . $this->context->route, 'page'=>'page', 'id' => $model->id], ['class' => 'contentDetail']); ?>
        <br>
    </p>
</article>