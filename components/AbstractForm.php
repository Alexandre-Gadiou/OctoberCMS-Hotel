<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;

abstract class AbstractForm extends ComponentBase
{

    public function getResultPageOptions()
    {
        return ['' => '- none -'] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}

?>
