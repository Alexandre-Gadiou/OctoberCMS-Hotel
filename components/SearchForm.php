<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractForm;

class SearchForm extends AbstractForm
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
            'redirect' => [
                'title' => 'algad.hotel::lang.searchForm.redirect',
                'type' => 'dropdown',
                'default' => ''
            ]
        ];
    }

}
