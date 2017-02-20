<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;

abstract class AbstractForm extends ComponentBase
{

    public function getResultPage()
    {
        $url = $this->property('resultPage');
        $resultPage = '';
        if ($url != null && $url != '')
        {
            $resultPage = 'data-request-data="redirect:' . "'" . $url . "'" . '"';
        }
        return $resultPage;
    }

    public function getResultPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}

?>
