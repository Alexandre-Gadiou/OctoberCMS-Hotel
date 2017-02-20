<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;

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
        ];
    }

}
