<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Illuminate\Support\Facades\DB;
use Algad\Hotel\Components\AbstractForm;
use Algad\Hotel\Models\Room;
use Algad\Hotel\Helpers\RoomHelper;


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

        // Get url parameters
        $data = get();
        $checkin = $data['checkin'];
        $checkout = $data['checkout'];
        $adults = $data['adults'];
        $children = $data['children'];

        return $bookingFormPage . "?checkin=" . $checkin 
        . "&checkout=" . $checkout
        . "&adults=" . $adults
        . "&children=" . $children
        . "&room_id=" . $room_id;
    }

    public function getAvailableRooms()
    {
        $data = get();
        return RoomHelper::getAvailableRooms($data['checkin'],$data['checkout']);
    }

}
