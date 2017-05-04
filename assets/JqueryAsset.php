<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jQuery](http://jquery.com/) JavaScript library.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JqueryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        '/hAdmin/js/jquery.min.js?v=2.1.4',
        'hAdmin/js/bootstrap.min.js?v=3.3.6',
        'hAdmin/js/plugins/metisMenu/jquery.metisMenu.js',
        'hAdmin/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'hAdmin/js/plugins/layer/layer.min.js',
        'hAdmin/js/noty/jquery.noty.min.js',
        'hAdmin/js/jquery.formpost.31.js',
        'hAdmin/js/hAdmin.js?v=4.1.0',
        'hAdmin/js/plugins/pace/pace.min.js',
    ];
}
