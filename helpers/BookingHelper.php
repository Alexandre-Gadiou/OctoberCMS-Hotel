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

    protected static $actionExists = null;

    public static function createBooking($data)
    {
        $user = Auth::getUser();

        // If user is not connected
        if ($user == null)
        {
            throw new ApplicationException("Try to book a room whithout beeing connected");
        }
        try
        {
            $data['rooms'] = BookingHelper::getRoomList($data['rooms']);
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
        } catch (Exception $e)
        {
            throw new ApplicationException("An error occured during the booking");
        }
    }

    private static function getRoomList($rooms)
    {
        $result = array();
        if (!empty($rooms))
        {
            $result = explode(",", $rooms);
        }
        return $result;
    }

}
