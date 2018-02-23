<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/21
 * Time: 9:36
 */


namespace app\assets;

use yii\web\AssetBundle;

class EchartsAsset extends AssetBundle
{
    public $sourcePath = '@bower/echarts/build/dist';
    public $js = [
        'echarts.js',
    ];
}