<?php

namespace Algad\Hotel\Helpers;

use Algad\Hotel\Models\Booking;
use Auth;
use Event;
use Exception;
use ApplicationException;

/**
 * Hotel Helper
 *
 * @package algad\hotel
 * @author Alexandre Gadiou
 */
class BookingHelper
{

    public static function createBooking($data)
    {
        $user = Auth::getUser();

        // If user is not connected
        if ($user == null)
        {
            throw new ApplicationException("Try to book a room whithout beeing connected");
        }
        
        $data['rooms'] = BookingHelper::getRoomList($data);
        $data['user_id'] = $user->id;

        Event::fire('algad.hotel.beforeBooking', [&$data]);

        $booking = new Booking();
        $booking->checkin = $data['checkin'];
        $booking->checkout = $data['checkout'];
        $booking->adults = $data['adults'];
        $booking->children = $data['children'];
        $booking->reserved = true;
        $booking->user_id = $data['user_id'];
        $now = $booking->freshTimestamp();
        $booking->created_at = $now;
        $booking->updated_at = $now;
        $booking->rooms = $data['rooms'];
        $booking->save();

        Event::fire('algad.hotel.booking', [$booking, $data]);

        return $booking;
       
    }

    private static function getRoomList($data)
    {
        $result = array();
        if (isset($data["room_id"]) && isset($data["rooms"]))
        {
            $result = $data["rooms"].",".$data["room_id"];
            $result = explode(",", $result);
        }else {
            $result = [$data["room_id"]];
        }
        return $result;
    }

}
