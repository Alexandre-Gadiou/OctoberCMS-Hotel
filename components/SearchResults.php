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
            'redirect' => [
                'title' => 'algad.hotel::lang.searchResult.redirect',
                'type' => 'dropdown',
                'default' => ''
            ],
        ];
    }

    public function getBookingLink($room_id)
    {
        $bookingFormPage = $this->property("redirect");
        $checkin = Input::get('checkin');
        $checkout = Input::get('checkout');

        return $bookingFormPage . '?checkin=' . $checkin . '&checkout=' . $checkout . "&room_id=" . $room_id;
    }

    public function getAvailableRooms()
    {
        $checkin = Input::get('checkin');
        $checkout = Input::get('checkout');

        $result = Room::get();

        return $result;
    }

}
