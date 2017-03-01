<?php

namespace Algad\Hotel\Helpers;

use Exception;
use ApplicationException;

/**
 * Url Helper
 *
 * @package algad\hotel
 * @author Alexandre Gadiou
 */
class UrlHelper
{

    public static function getUrlParameter($string)
    {
        $result = "";
        if (isset($_GET[$string]))
        {
            $result = $_GET[$string];
        }
        return $result;
    }

}
