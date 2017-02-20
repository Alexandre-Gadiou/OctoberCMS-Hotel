<?php

namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;
use Cms\Classes\Page;

abstract class AbstractAccountForm extends RAccount
{

    public function getDataResultPage()
    {
        $prop = $this->property('resultPage');
        $page = Page::find($prop);
        $url = $page->url;
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
