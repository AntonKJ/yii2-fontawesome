<?php
/**
 * AssetBundle.php
 * @author Anton Devcoder
 */

namespace antonkj\yii\fontawesome\cdn;

/**
 * Class AssetBundle
 * @package antonkj\yii\fontawesome
 */
class AssetBundle extends \yii\web\AssetBundle
{

    /**
     * @inherit
     */
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
}
