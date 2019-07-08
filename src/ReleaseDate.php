<?php
namespace robottens\releasedate;

use robottens\releasedate\twigextensions\ReleaseDateTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;

class ReleaseDate extends \craft\base\Plugin
{

    public static $plugin;

    public function init()
    {

        parent::init();
        self::$plugin = $this;

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new ReleaseDateTwigExtension() );
    }
}
