<?php
namespace robottens\releasedate\twigextensions;

use robottens\releasedate\ReleaseDate;
use Craft;

class ReleaseDateTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ReleaseDate';
    }
    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
     /*
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('md5', [$this, 'strMd5']),
        ];
    }
    */
    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('releasedate', [$this, 'releaseDate']),
        ];
    }
    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function releaseDate($year = null, $month = null, $day = null)
    {

        if (!empty($year) && empty($month) && empty($day) ) {

            if (!checkdate(1, 1, $year) ) {
                return "Unknown";
            }
            else {
                return $year;
            }
        }

        if (!empty($year) && !empty($month) && empty($day) ) {

            if (!checkdate($month, 1, $year) ) {
                return "Unknown";
            }
            else {
                return strftime("%B %Y", mktime(0, 0, 0, $month, 1, $year) );
            }
        }

        if (!empty($year) && !empty($month) && !empty($day) ) {

            if (!checkdate($month, $day, $year) ) {
                return "Unknown";
            }
            else {
                return strftime("%#d %B %Y", mktime(0, 0, 0, $month, $day, $year) );
            }
        }

        return "Unknown";
    }
}
