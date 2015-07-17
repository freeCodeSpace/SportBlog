<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name); ?></title>
    
  <!-- FavIco -->
    <link rel="shortcut icon" href="<?= Yii::$app->urlManager->baseUrl; ?>/favIcon.ico" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="box">

        <header id="header"><?= Html::a('Блог о Спорте', Yii::$app->urlManager->baseUrl); ?></header>
      <!-- Левый блок -->
        <div id="left">
            <nav id="nav">
                <p id="navTitleText">Содержание :</p>
                <hr id="navLine">
                <?= Menu::widget([

                        'options' => [
                            'tag' => 'div',
                            'id' => 'navItems',
                        ],

                        'itemOptions' => [
                            'class' => 'navBoxUrl',
                            'tag' => 'div',
                        ],
                        
                        'linkTemplate' => '<a href="{url}" class="navUrl">{label}</a>',

                        'items' => [
                            [
                                'label' => 'О спорте',
                                'url' => ['/sport-blog/about-sport'],
                            ],
                            [
                                'label' => 'Бодибилдинг',
                                'url' => ['/sport-blog/body-building'],
                            ],
                            [
                                'label' => 'Всё содержание',
                                'url' => ['/sport-blog/all-sport'],
                            ],
                        ],

                    ]);
                ?>
            </nav>

            <aside id="note">
                <?= $this->render('_note') ?>
            </aside>
        </div>
      <!-- Правый блок -->
        <section id="right">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink'=> ['label' => 'Главная', 'url' => ['/sport-blog/index']],
            ]); ?>

            <?= $content ?>
        </section>
        <footer id="footer">
            <p id="footerText1">сделано на Yii2</p>
            <p id="footerText2">ноябрь 2014 год.</p>
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>