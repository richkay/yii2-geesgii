<?php

namespace richkay\geesgii;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Gii.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GiiAsset extends AssetBundle
{
    public $sourcePath = '@richkay/geesgii/assets';
    public $css = [
        'main.css',
    ];
    public $js = [
        'geesgii.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'richkay\geesgii\TypeAheadAsset',
    ];
}
