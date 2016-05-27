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
		'kartik\grid\GridViewAsset',
    ];
	public function init() {
       // In dev mode use non-minified javascripts
       $this->js = YII_DEBUG ? [
           'ModalRemote.js',
           'geesgiicrud.js',
       ]:[
           'ModalRemote.min.js',
           'geesgiicrud.min.js',
       ];

       parent::init();
   }
}
