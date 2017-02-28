<?php

namespace Algad\Hotel\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Illuminate\Support\Facades\DB;
use Algad\Hotel\Components\AbstractForm;
use Algad\Hotel\Models\Room;

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

        return $bookingFormPage . '?checkin=' . $checkin . '&checkout=' . $checkout . "&room_id=" . $room_id;
    }

    public function getAvailableRooms()
    {
        // Get url parameters
        $data = get();
        $checkin = $data['checkin'];
        $checkout = $data['checkout'];

        $ids = Db::select("SELECT id FROM algad_hotel_rooms r WHERE r.id NOT IN( SELECT b.room_id FROM algad_hotel_bookings b where not (b.checkout <= '" . $checkin . "' OR b.checkin >= '" . $checkout . "') )");
        $ids = array_column($ids, 'id');
        $result = Room::whereIn('id', $ids)->get();

        return $result;
    }

}
