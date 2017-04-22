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
        'css/style.css',
				'css/fotorama.css',
    ];
    public $js = [
				'https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js',
				'https://yastatic.net/share2/share.js',
				'js/fotorama.js',
				'js/script.js',
    ];
    public $depends = [
				'app\assets\Html5ShivAsset',
        'app\assets\RespondAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
