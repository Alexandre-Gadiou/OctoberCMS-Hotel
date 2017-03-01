<?php

namespace Algad\Hotel\Helpers;

use Illuminate\Support\Facades\DB;
use Algad\Hotel\Models\Room;
use Exception;
use ApplicationException;

/**
 * Room Helper
 *
 * @package algad\hotel
 * @author Alexandre Gadiou
 */
class RoomHelper
{

    public static function getAvailableRooms($checkin, $checkout)
    {
        $ids = Db::select("SELECT id FROM algad_hotel_rooms r "
                        . "WHERE r.id NOT IN( "
                        . "SELECT room_id FROM (SELECT * FROM algad_hotel_bookings_rooms br join algad_hotel_bookings b on b.id = br.booking_id) b "
                        . "where not (b.checkout <= '" . $checkin . "' OR b.checkin >= '" . $checkout . "') "
                        . "or (b.reserved!=true and (b.checkout <= '" . $checkin . "' OR b.checkin >= '" . $checkout . "') ) "
                        . ")");
        $ids = array_column($ids, 'id');
        $result = Room::whereIn('id', $ids)->get();

        return $result;
    }

}
