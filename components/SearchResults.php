<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Input;
use Algad\Hotel\Models\Room;
use Algad\Hotel\Components\AbstractForm;

class SearchResults extends AbstractForm
{

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
            'resultPage' => [
                'title' => 'algad.hotel::lang.searchResult.resultPage',
                'type' => 'dropdown',
                'default' => ''
            ],
        ];
    }

    public function getBookingLink($roomID)
    {
        $bookingPage = $this->property("bookingPage");
        $checkin = Input::get('checkin');
        $checkout = Input::get('checkout');

        return $bookingPage . '?checkin=' . $checkin . '&checkout=' . $checkout . "&roomID=" . $roomID;
    }

    public function getAvailableRooms()
    {
        $checkin = Input::get('checkin');
        $checkout = Input::get('checkout');

        $result = Room::get();

        return $result;
    }

}
