<?php

namespace assets;

use yii\web\AssetBundle;

class CatalogAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/catalog';
    public $css = [
        'css/catalog.css',
    ];
    public $js = [
        'js/catalog.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}