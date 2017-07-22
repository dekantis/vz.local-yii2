<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm/font-awesome';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.css',
    ];
    public $js = [
    ];
}
