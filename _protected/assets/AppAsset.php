<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/pagination.css',
        'css/styles.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset', // необх. для работы ajax
        // 'yii\bootstrap\BootstrapAsset', // отключим для нашего проекта
    ];
}
