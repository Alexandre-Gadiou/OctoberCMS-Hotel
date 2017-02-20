<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;

class SearchForm extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.searchForm.name',
            'description' => 'algad.hotel::lang.searchForm.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'resultPage' => [
                'title' => 'algad.hotel::lang.searchForm.resultPage',
                'type' => 'dropdown',
                'default' => ''
            ],
        ];
    }

    public function getResultPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}
