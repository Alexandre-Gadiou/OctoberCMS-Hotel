<?php

namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;
use Cms\Classes\Page;

abstract class AbstractAccountForm extends RAccount
{

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

    public function getRedirectOptions()
    {
        return ['' => '- none -'] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}

?>
