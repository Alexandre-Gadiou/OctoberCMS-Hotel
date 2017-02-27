<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;

abstract class AbstractForm extends ComponentBase
{

    public function getRedirectOptions()
    {
        return ['' => '- none -'] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getDataRedirect()
    {
        $prop = $this->property('redirect');
        $page = Page::find($prop);
        $url = $page->url;
        $redirectPage = '';
        if ($url != null && $url != '')
        {
            $redirectPage = 'data-request-data="redirect:' . "'" . $url . "'" . '"';
        }
        return $redirectPage;
    }

}

?>
