<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Input;
use Algad\Hotel\Models\Room;

class SearchResults extends ComponentBase
{

    public $searchTerm;

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.searchResult.name',
            'description' => 'algad.hotel::lang.searchResult.description'
        ];
    }

    public function defineProperties()
    {
        return [
        ];
    }

    public function getAvailableRooms()
    {
        $checkin = Input::get('checkin');
        $checkout = Input::get('checkout');

        $result = Room::get();

        return $result;
    }

}
